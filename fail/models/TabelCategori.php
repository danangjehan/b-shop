<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_categori".
 *
 * @property integer $id_categori
 * @property string $categori_barang
 *
 * @property TabelBukuDetail[] $tabelBukuDetails
 */
class TabelCategori extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_categori';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categori_barang'], 'required'],
            [['categori_barang'], 'string', 'max' => 255],
            [['categori_barang'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categori' => 'Id Categori',
            'categori_barang' => 'Categori Barang',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelBukuDetails()
    {
        return $this->hasMany(TabelBukuDetail::className(), ['id_categori' => 'id_categori']);
    }
}
