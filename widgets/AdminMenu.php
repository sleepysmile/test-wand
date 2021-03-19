<?php

namespace app\widgets;

use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\Widget;
use yii\helpers\ArrayHelper;

class AdminMenu extends Nav
{
    private static $increment;

    public $submenuOptions = [];

    public function init()
    {
        if ($this->route === null && Yii::$app->controller !== null) {
            $this->route = Yii::$app->controller->getRoute();
        }
        if ($this->params === null) {
            $this->params = Yii::$app->request->getQueryParams();
        }
    }

    public function renderItems()
    {
        $items = [];
        foreach ($this->items as $i => $item) {
            self::$increment = "dropDown$i";
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            $items[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode("\n", $items), $this->options);
    }

    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
        $label = $encodeLabel ? Html::encode($item['label']) : $item['label'];
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items');
        $url = ArrayHelper::getValue($item, 'url', '#');
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);
        $disabled = ArrayHelper::getValue($item, 'disabled', false);
        $active = $this->isItemActive($item);

        Html::addCssClass($options, ['widget' => 'nav-item']);
        if (empty($items)) {
            $items = '';
            Html::addCssClass($linkOptions, ['widget' => 'nav-link']);
        } else {
            if ($url === '#') {
                $i = self::$increment;
                $url = "#$i";
            }

            $linkOptions['data-toggle'] = 'collapse';
            $linkOptions['aria-expanded'] = 'false';
            Html::addCssClass($linkOptions, ['widget' => 'dropdown-toggle nav-link']);
            if (is_array($items)) {
                $items = $this->isChildActive($items, $active);
                $items = $this->renderDropdown($items, $item);
            }
        }

        if ($disabled) {
            ArrayHelper::setValue($options, 'tabindex', '-1');
            ArrayHelper::setValue($options, 'aria-disabled', 'true');
            Html::addCssClass($options, ['disable' => 'disabled']);
        } elseif ($this->activateItems && $active) {
            Html::addCssClass($options, ['activate' => 'active']);
        }

        return Html::tag('li', Html::a($label, $url, $linkOptions) . $items, $options);

    }

    protected function renderDropdown($items, $parentItem)
    {
        $i = self::$increment;
        $itemsStack = [];
        foreach ($items as $item) {
            $itemsStack[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode(PHP_EOL, $itemsStack), array_merge($this->submenuOptions, ['id' => $i]));
    }
}