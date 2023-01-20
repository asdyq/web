<?php
$id = $_GET['id'];
echo $id;
$doc = new DOMDocument();
$doc->load('data.xml');
$products = $doc->getElementsByTagName('products')
    ->item(0);
$product = $products->getElementsByTagName('product');
$product1 = $products->getElementsByTagName('product');
$oldname = $product1->item($id - 1)->getElementsByTagName('name')
    ->item(0)->nodeValue;
$oldprice = $product1->item($id - 1)->getElementsByTagName('price')
    ->item(0)->nodeValue;
$olddescr = $product1->item($id - 1)->getElementsByTagName('description')
    ->item(0)->nodeValue;
if (isset($_POST['submit']))
{
    $the_name = $_POST['the_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $newprod = $doc->createElement('product');
    $new_id = $doc->createElement('id', $id);
    $newprod->appendChild($new_id);
    if (!empty($the_name))
    {
        $new_name = $doc->createElement('name', $the_name);
    }
    else
    {
        $new_name = $doc->createElement('name', $oldname);
    }
    $newprod->appendChild($new_name);

    if (!empty($price))
    {
        $new_price = $doc->createElement('price', $price);
    }
    else
    {
        $new_price = $doc->createElement('price', $oldprice);
    }
    $newprod->appendChild($new_price);
    if (!empty($description))
    {
        $new_descr = $doc->createElement('description', $description);
    }
    else
    {
        $new_descr = $doc->createElement('description', $olddescr);
    }
    $newprod->appendChild($new_descr);

    $cnt = 0;

    while (is_object($product->item($cnt++)))
    {
        $tmp = $product->item($cnt - 1)->getElementsByTagName('id')
            ->item(0);
        $tmpid = $tmp->nodeValue;
        if ($tmpid == $id)
        {
            $products->replaceChild($newprod, $product->item($cnt - 1));
            break;
        }
    }
    $doc->formatOutput = true;
    $doc->save('data.xml') or die('Error');
    header('location:/lab_4/index.php?page=list');
}
?>