<?
Error_Reporting(0);
$dir = $_REQUEST['dir'];
$file = $_REQUEST['file'];
$rc = $_REQUEST['rc'];
$act = $_REQUEST['act'];
$file_path="images/$dir/";

//echo $_SERVER['SERVER_NAME'].'/'.$file_path.$file;

$thumb = new Imagick();
//������ �������� �� ������� ����

//try {
$thumb->readImage($_SERVER['DOCUMENT_ROOT'].'/'.$file_path.$file);
//echo "images/other/image10.jpg";
//$thumb->readImage("i.jpg");
//die();
//} catch(Exception $e) {
 //   echo $e->getTraceAsString();
//}

$image_height = $thumb->getImageHeight();
$image_width = $thumb->getImageWidth();

if ($image_width>=$image_height)
{
$width =0;
if ($act=="view"){$height = 500;} else {$height = 100;};}
else
{$height = 0;
if ($act=="view"){$width =500;} else {$width =100;};
}

//������ ������

$thumb->thumbnailImage($width, $height);
$thumb_height = $thumb->getImageHeight();
$thumb_width = $thumb->getImageWidth();

//������� ����� ���, ������ ������, ��� � ������, ����� ���� ���� �������� ����

$canvas = new Imagick();

$canvas->newImage($thumb_width+10, $thumb_height+10, new ImagickPixel("white"), "jpg");


//������� ��������, ���� ������ ������
if ($width < 300)
    $thumb->sharpenImage(4, 1);

//���������� ����
if ($rc)
{
$thumb->roundCorners($rc, $rc);
}


//������ ����� ��������, ����� ������� ����

$shadow = $thumb->clone();

//���� ����
$shadow->setImageBackgroundColor(new ImagickPixel('black'));

//����������, ������ ����
$shadow->shadowImage(80, 2.5, 5, 5);

//����������� ���� �� ���

$canvas->compositeImage($shadow, $shadow->getImageCompose(),0 ,0 );

//����������� ������ �� ���

$canvas->compositeImage($thumb, $thumb->getImageCompose(),0 ,0 );

//������� �������� � �.�. �� ��������

$canvas->stripImage();

//���������� ��������
//$canvas->writeImage($writeTo);

//$canvas->writeImage("th_".$file);

header("Content-Type: image/jpeg");

echo $canvas;

//echo $thumb;

//��������� �� �����

$canvas->destroy();
$shadow->destroy();
$thumb->destroy();

?>