# EminEngine
This is a php framework which is under development.


---
## Tanım

Yüksek performanslı sistemler yazılması için tasarlanmakta olan bir frameworkdür.
Vakit bulduğum sürece geliştirmeye devam edeceğim. Henüz 0 diyebileceğimiz bir noktadadır.
Algoritma çalışması halen devam etmek ile birlikte küçük miktarda yazım işlemi de gerçekleştirilmiş bulunmaktadır.



---

#Modüller

Önbellek
-----
```
$cache->getcache($id, $cat = "global);
$cache->createCache($id, $data, $cat = "global);
```
Cache sistemi global ve kullanıcıya-duruma özel önbellek oluşturmanızı sağlar. 3 adet seçenek bulunmaktadır. Bu seçenekler arasında geçiş yapmak için ``conf/modules.json`` dosyasındaki cache bölümünden ``memcached, mysql, file`` olacak şekilde değiştirebilirsiniz.

Veritabanı
--------
Veritabanı bilgisini ``conf/global.json`` dosyasından düzenleyerek sistemin çalışacağı veritabanını ayarlayabilirsiniz.

Gömülü dil çoklu desteği
-----
Bu sistem geliştirilme aşamasındadır. Belgelendirme modül tamamen geliştirildiğinde paylaşılacaktır.

--------
Daha fazla bilgi ileride eklenecek. Henüz başlangıç aşamasındayız.