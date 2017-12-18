<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Country;
use common\models\City;
use common\models\Event;


/**
 * ParserController class
 */
class ParserController extends Controller
{

    //Страна по умолчанию Россия
    private $county_id = 1;
    //Город по умолчанию Москва
    private $city_id = 1;
    //Количество мероприятий по умолчанию (max 1000)
    private $count = 1000;
    //при передаче значения 1 будут выведены предстоящие события
    private $future = 1;
    //тип группы (возможные значения: group, page, event)
    private $type = 'event';
    //Метод vk API
    private $method = 'groups.search';

    //Поля группы
    private $fields = [
        'city',
        'description',
        'members_count',
        'start_date',
        'finish_date',
        'place'
    ];


    public function actionIndex()
    {
        ini_set('memory_limit', -1);
        $city_list = City::findAll(['country_id' => $this->county_id]);
        foreach ($city_list as $city) {

            $params = [
                'count' => $this->count,
                'city_id' => $city->vk_id,
                'country_id' => $this->county_id,
                'type' => $this->type,
                'future' => $this->future,
                'count' => $this->count,
                'q' => ' ',
                'fields' => (!empty($this->fields)) ? $this->fields : []
            ];

            $response = Yii::$app->vk->query($this->method, $params);
            $data = json_decode($response);
            if (!empty($data->response->items)) {
                foreach ($data->response->items as $item) {

                    $model = new Event();
                    $fields = [
                        'name' => $this->remove_smiles($item->name),
                        'description' => (!empty($item->description)) ? $this->remove_smiles($item->description) : null,
                        'api_id' => $item->id,
                        'api_type' => 1,
                        'city_id' => $city->vk_id,
                        'country_id' => $this->county_id,
                        'map' => (!empty($item->place->latitude)) ? $item->place->latitude . ',' . $item->place->longitude : null,
                        'start_date' => (!empty($item->start_date)) ? date('Y-m-d H:i:s', $item->start_date) : null,
                        'finish_date' => (!empty($item->finish_date)) ? date('Y-m-d H:i:s', $item->finish_date) : null,
                        'image' => $item->photo_200,
                    ];
                    $model->setAttributes($fields, false);
                    $model->save();
                }
            }
        }
        echo "<pre>";
        print_r('complete!');
        echo "</pre>";
    }

    public function remove_smiles($text)
    {
        // Match Emoticons
        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u';
        $clean_text = preg_replace($regexEmoticons, '', $text);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $clean_text = preg_replace($regexSymbols, '', $clean_text);

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        $clean_text = preg_replace($regexTransport, '', $clean_text);

        // Match Miscellaneous Symbols
        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
        $clean_text = preg_replace($regexMisc, '', $clean_text);

        // Match Dingbats
        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        // Match Flags
        $regexDingbats = '/[\x{1F1E6}-\x{1F1FF}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        // Others
        $regexDingbats = '/[\x{1F910}-\x{1F95E}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        $regexDingbats = '/[\x{1F980}-\x{1F991}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        $regexDingbats = '/[\x{1F9C0}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        $regexDingbats = '/[\x{1F9F9}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        return $clean_text;
    }

    public function actionCountry()
    {
        $params = [
            'count' => $this->count,
            'need_all' => true,
        ];

        $response = Yii::$app->vk->query('database.getCountries', $params);
        $data = json_decode($response);
        foreach ($data->response->items as $item) {
            $model = new Country();
            $model->id = $item->id;
            $model->title = $item->title;
            if ($model->save() === false && !$model->hasErrors()) {
                throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
            }
        }
    }

    public function actionCity()
    {
        $params = [
            'count' => $this->count,
            'need_all' => true,
        ];

        $response = Yii::$app->vk->query('database.getCountries', $params);
        $data = json_decode($response);
        foreach ($data->response->items as $item) {
            $model = new Country();
            $model->id = $item->id;
            $model->title = $item->title;
            if ($model->save() === false && !$model->hasErrors()) {
                throw new ServerErrorHttpException('Failed to update the object for unknown reason.');
            }
        }
    }
}