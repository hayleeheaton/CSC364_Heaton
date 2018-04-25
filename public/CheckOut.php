<?php
require ($_SERVER[ 'DOCUMENT_ROOT'] . "/../includes/application_includes.php");
require_once (FS_TEMPLATES .'index.php');
require_once (FS_TEMPLATES .'Cart.php');
$requestType = $_SERVER['REQUEST_METHOD'];
$cartItems = [];
$cart = new Cart();
$cartItems=$cart->get();
$total = $cart->calculateTotal($cartItems);
$shipping = 7.95;
if ($total > 100.00)
{
    $shipping = 0.00;
}
$tax = $total * .06;
$grandTotal = $total + $shipping + $tax;
$customerInfo = [];
$orderInfo = new orderInfo();
$customerInfo = $orderInfo->get();
mainHeaderTemplate::pageHeader();
?>
<div class="container">
    <div class="row">
        <div class="filler col-xs-2"></div>
        <div class="col-xs-8">
            <h2 style="text-decoration: underline">Purchase Overview</h2>
            <div class="row">
                <div class="col-xs-12">

                    <h3 style="text-decoration: underline">Shopping Cart Review</h3>
                    <div class="col-xs-12">
                        <div class="col-xs-3"><h4>Product Picture</h4></div><div class="col-xs-3"><h4>Product Name</h4></div><div class="col-xs-2"><h4>Price</h4></div><div class="col-xs-2"><h4>Quantity</h4></div><div class="col-xs-2"><h4>Item Total</h4></div>
                    </div>
                    <?php
                    foreach($cartItems as $row => $innerArray) {
                        $pic = $innerArray['pic'];
                        $price = $innerArray['price'];
                        $qty_amount = $innerArray['quatnity'];
                        $name = $innerArray['name'];
                        $itemTotal = $qty_amount * $price;
                        classReviewFinal::cartFinal($picture,$price,$qty_amount,$name, $itemTotal);
                    }
                    ?>
                    <div class="col-xs-8">
                        <h4>Customer Name: <?php echo $customerInfo[0]['firstName']?> <?php echo $customerInfo[0]['lastName']?></h4>
                    </div>
                    <div class="col-xs-4"><h4>Total: $<?php echo number_format((float)$total, 2, '.', '')?></h4></div>

                    <div class="col-xs-8">
                        <h4>Shipping Address: <?php echo $customerInfo[0]['address']?></h4>
                    </div>
                    <div class="col-xs-4"><h4>Tax: $<?php echo number_format((float)$shipping, 2, '.', '')?></h4></div>

                    <div class="col-xs-8">
                        <h4>City State Zip: <?php echo $customerInfo[0]['cityStateZip']?></h4>
                    </div>
                    <div class="col-xs-4"><h4>Shipping: $<?php echo number_format((float)$tax, 2, '.', '')?></h4></div>

                    <div class="col-xs-8">
                        <h4>Card Number: <?php echo $customerInfo[0]['cardNumber']?></h4>
                    </div>
                    <div class="col-xs-4"><h4>Final Total: $<?php echo number_format((float)$grandTotal, 2, '.', '')?></h4></div>

                    <div class="col-xs-8">

                    </div>
                    <div class="col-xs-4">
                        <form id="shippingForm" action='informationCommit.php' method="POST" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="button1id"></label>
                            <div class="col-md-12">
                                <a href="cartView.php" button id="button1id" name="button1id" class="btn btn-info">Return To Cart</a></button>
                                <button id="button2id" name="button2id" class="btn btn-success">Purchase </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="filler col-xs-2"></div>
    </div>
</div>

<?php
mainFooterTemplate::mainFooter();