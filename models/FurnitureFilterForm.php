<?php


namespace app\models;

use yii\base\Model;


class FurnitureFilterForm extends Model
{
    public $priceFrom;
    public $priceTo;
    public $isRenovated;
    public $text;
    public $styleId;
    public $typeId;

    public function rules()
    {
        return [
            [[
                'priceFrom',
                'priceTo',
            ], 'integer', 'skipOnEmpty' => true,  'min' => 0,
                'message' => 'Wartość pola "{attribute}" musi być liczbą całkowitą',
                'tooSmall' => 'Wartość pola "{attribute}" nie może być ujemna',
            ],
            [['isRenovated', 'styleId', 'typeId'], 'safe'],
            [[ 'text'], 'string', 'max' => 32, 'message' => 'Pole "{attribute}" musi być łańcuchem znaków.', 'tooLong' => 'To pole może mieć max. długość 32 znaków.']
        ];
    }
    public function attributeLabels()
    {
        return [
            'priceFrom' => 'Cena od [zł]',
            'priceTo' => 'Cena do [zł]',
            'hasBalcony' => 'Po renowacji',
            'text' => 'Wyszukaj',
            'isRenovated' => 'Po renowacji',
            'styleId' => 'Styl',
            'typeId' => 'Typ',
        ];
    }

    public function buildQuery(&$query){
        if(!empty($this->priceFrom)){
            $query = $query->andWhere(['>=','furniture.price', $this->priceFrom]);
        }

        if(!empty($this->priceTo)){
            $query = $query->andWhere(['<=','furniture.price', $this->priceTo]);
        }


        if(!empty($this->isRenovated)){
            if($this->isRenovated == 1){
                $query = $query->andWhere(['=','furniture.is_renovated', '1']);
            }
            if($this->isRenovated == 2){
                $query = $query->andWhere(['=','furniture.is_renovated', '0']);
            }
        }

        if(!empty($this->text)){
            $query = $query->andWhere(['OR',
                ['LIKE', 'furniture.name', $this->text],
                ['LIKE', 'furniture.description', $this->text],
                ['LIKE', 'furniture_style.name', $this->text],
                ['LIKE', 'furniture_type.name', $this->text],
            ]);
        }

        if(!empty($this->styleId)){
            $query = $query->andWhere(['furniture.furniture_style_id' => $this->styleId]);
        }

        if(!empty($this->typeId)){
            $query = $query->andWhere(['furniture.furniture_type_id' => $this->typeId]);
        }
    }

    public function isEmpty(){
        return empty($this->priceFrom) && empty($this->priceTo) && empty($this->isRenovated) && empty($this->styleId) && empty($this->typeId);
    }
}
