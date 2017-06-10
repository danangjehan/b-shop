<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabel_barang".
 *
 * @property integer $id_barang
 * @property integer $id_user_upload
 * @property string $nama_barang
 * @property string $nama_penulis
 * @property string $penerbit_buku
 * @property string $sinopsis
 * @property integer $harga
 * @property string $tanggal_upload
 *
 * @property TabelUser $idUserUpload
 * @property TabelBukuDetail[] $tabelBukuDetails
 * @property TabelGambarBarang[] $tabelGambarBarangs
 * @property TabelTransaksi[] $tabelTransaksis
 */
class TabelBarang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabel_barang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user_upload', 'nama_barang', 'nama_penulis', 'penerbit_buku', 'harga', 'tanggal_upload', 'quantity'], 'required'],
            [['id_user_upload', 'harga'], 'integer'],
            [['tanggal_upload'], 'safe'],
            [['nama_barang', 'nama_penulis', 'penerbit_buku'], 'string', 'max' => 100],
            [['sinopsis'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'id_user_upload' => 'Id User Upload',
            'nama_barang' => 'Nama Barang',
            'nama_penulis' => 'Nama Penulis',
            'penerbit_buku' => 'Penerbit Buku',
            'sinopsis' => 'Sinopsis',
            'harga' => 'Harga',
            'tanggal_upload' => 'Tanggal Upload',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserUpload()
    {
        return $this->hasOne(TabelUser::className(), ['user_id' => 'id_user_upload']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelBukuDetails()
    {
        return $this->hasMany(TabelBukuDetail::className(), ['id_buku' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelGambarBarangs()
    {
        return $this->hasMany(TabelGambarBarang::className(), ['id_barang' => 'id_barang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTabelTransaksis()
    {
        return $this->hasMany(TabelTransaksi::className(), ['id_barang' => 'id_barang']);
    }
}
