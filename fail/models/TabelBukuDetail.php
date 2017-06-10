<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_buku_detail".
 *
 * @property integer $id_buku_detail
 * @property integer $id_buku
 * @property integer $id_categori
 *
 * @property TabelBarang $idBuku
 * @property TabelCategori $idCategori
 */
class TabelBukuDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_buku_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_buku', 'id_categori'], 'required'],
            [['id_buku', 'id_categori'], 'integer'],
            [['id_buku'], 'exist', 'skipOnError' => true, 'targetClass' => TabelBarang::className(), 'targetAttribute' => ['id_buku' => 'id_barang']],
            [['id_categori'], 'exist', 'skipOnError' => true, 'targetClass' => TabelCategori::className(), 'targetAttribute' => ['id_categori' => 'id_categori']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_buku_detail' => 'Id Buku Detail',
            'id_buku' => 'Buku',
            'id_categori' => 'Categori',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBuku()
    {
        return $this->hasOne(TabelBarang::className(), ['id_barang' => 'id_buku']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategori()
    {
        return $this->hasOne(TabelCategori::className(), ['id_categori' => 'id_categori']);
    }
}
