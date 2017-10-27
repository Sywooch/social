<?php
namespace app\components;

use yii\base\Exception;

class Registry {

    /**
     * Данные регистра.
     *
     * @var array
     */
    private static $_data = [];

    /**
     * Установить.
     *
     * @param $key
     * @param $value
     * @param bool $force
     *
     * @throws Exception
     */
    public static function set($key, $value, $force = false)
    {
        if (isset(self::$_data[$key]) && $force === false) {
            throw new Exception(\Yii::t('app', 'Значение присудствует в регистре:') . $key);
        }

        self::$_data[$key] = $value;
    }

    /**
     * Получить.
     *
     * @param $key
     * @param null $default
     *
     * @return mixed|null
     */
    public static function get($key, $default = null)
    {
        if (!isset(self::$_data[$key])) {
            return $default;
        }

        return self::$_data[$key];
    }
}
