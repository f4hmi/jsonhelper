# jsonhelper
untuk memanipulasi json data dengan menyisipkan function pada value object json agar tidak berubah menjadi string, dalam studi kasus kali ini menggunakan dataTable

cara penggunaannya

```php
$tmpDefs = array(
 'targets' => 0,
 'createdCell' => 'function(td, cellData, rowData, row, col) {$(td).attr("data-field","_id");}'
); 
```
Pemanggilan class
```php
//inisialisasi
$nmanipulate = new manipulateData();

//set array yang akan di ubah menajadi json
$nmanipulate->changeJson($tmpDefs);

//untuk menampilkan hasil manipulasi json
echo $nmanipulate->getManipulate();
```

Response yang akan diberikan

```json
{"targets":2,"createdCell":function(td, cellData, rowData, row, col) {$(td).attr("data-field","_id");}}
```
