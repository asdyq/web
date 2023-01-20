<?php
$id = $_GET['id'];
$dom = new DOMDocument();
$dom->load('data.xml');
$products = $dom->getElementsByTagName('products')
    ->item(0);
$product = $products->getElementsByTagName('product');
$i = 0;
while (is_object($product->item($i++)))
{
    $prd = $product->item($i - 1)->getElementsByTagName('id')
        ->item(0);
    $prd_id = $prd->nodeValue;
    if ($prd_id == $id)
    {
        $products->removeChild($product->item($i - 1));
        break;
    }
}
$dom->formatOutput = true;
$dom->save('data.xml') or die('Error');
header('location:/lab_4/index.php?page=list');
?>