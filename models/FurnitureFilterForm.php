<?php


namespace app\models;

use yii\base\Model;


class FurnitureFilterForm extends Model
{
    public $priceFrom;
    public $priceTo;
    public $numberOfRoomsFrom;
    public $numberOfRoomsTo;
    public $areaFrom;
    public $areaTo;
    public $storeyFrom;
    public $storeyTo;
    public $isRenovated;

    public function rules()
    {
        return [
            [[
                'priceFrom',
                'priceTo',
                'numberOfRoomsFrom',
                'numberOfRoomsTo',
                'areaFrom',
                'areaTo',
                'storeyFrom',
                'storeyTo',
            ], 'integer', 'skipOnEmpty' => true,  'min' => 0,
                'message' => 'Wartość pola "{attribute}" musi być liczbą całkowitą',
                'tooSmall' => 'Wartość pola "{attribute}" nie może być ujemna',
            ],
            [['isRenovated'], 'safe'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'priceFrom' => 'Cena od [zł]',
            'priceTo' => 'Cena do [zł]',
            'hasBalcony' => 'Po renowacji',
        ];
    }

    public function buildQuery(&$query){
        if(!empty($this->priceFrom)){
            $query = $query->andWhere(['>=','price', $this->priceFrom]);
        }

        if(!empty($this->priceTo)){
            $query = $query->andWhere(['<=','price', $this->priceTo]);
        }


        if(!empty($this->isRenovated)){
            if($this->isRenovated == 1){
                $query = $query->andWhere(['=','is_renovated', '1']);
            }
            if($this->isRenovated == 2){
                $query = $query->andWhere(['=','is_renovated', '0']);
            }
        }
    }
}
