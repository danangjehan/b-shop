<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_gambar_barang".
 *
 * @property integer $id_gambar
 * @property integer $id_barang
 * @property integer $path_gambar
 *
 * @property TabelBarang $idBarang
 */
class TabelGambarBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_gambar_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_barang', 'path_gambar'], 'required'],
            [['id_barang'], 'integer'],
            ['path_gambar', 'file'],
            [['id_barang'], 'exist', 'skipOnError' => true, 'targetClass' => TabelBarang::className(), 'targetAttribute' => ['id_barang' => 'id_barang']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_gambar' => 'Id Gambar',
            'id_barang' => 'Id Barang',
            'path_gambar' => 'Path Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdBarang()
    {
        return $this->hasOne(TabelBarang::className(), ['id_barang' => 'id_barang']);
    }
}
