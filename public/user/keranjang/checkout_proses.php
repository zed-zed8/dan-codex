<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;


include "../template/include.php";
require_once dirname(__FILE__) . '/../../../include/midtrans-php-master/Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'Mid-server-tBkkWWFAVQspjhtBw_pyQiAr';
Config::$clientKey = 'Mid-client-CSDIDi3M8oTgkquj';

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

// post variable
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// membuat isi keranjang + total harga
$session_keranjang = $_SESSION['keranjang'];
$jumlah = $_SESSION['jumlah'];

$produk = new \produk();
$item_details = [];
$no = 0;
$total_harga = 0;
foreach ($session_keranjang as $data) {
    foreach ($produk->get_data_by_id($data) as $data2) {
        $item_details[] = [
            "id" => $data2['id'],
            "price" => (int) $data2['harga'],
            "quantity" => (int) $jumlah[$no],
            "name" => $data2['nama_produk'],
        ];
        // echo $jumlah[$no];
        // echo "<br>";
        // echo $data2['harga'];
        // echo "<pre>";
        // var_dump($_POST['jumlah']);
        // echo "</pre>";
        $total_harga += $jumlah[$no] * $data2['harga'];
        $no++;
    }
}

// Required
$transaction_details = array(
    'order_id' => "ORDER" . "-" . $_SESSION['username'] . "-" . date("YmdHis"),
    'gross_amount' => $total_harga, // no decimal allowed for creditcard
);
// Optional
$users = new \users();
foreach ($users->get_user($_SESSION['username']) as $data) {
    $customer_details = [
        'first_name'    => $first_name,
        'last_name'     => $last_name,
        'email'       => $email,
        'phone'       => $phone,
    ];
}

// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
    echo $e->getMessage();
}
// echo $snap_token;
?>

</html>

<!-- Start Header -->
<?php include __DIR__ . "/../template/head.php"; ?>
<!-- End Header -->

<body>
    <?php include __DIR__ . "/../template/header.php"; ?>

    <h1>Checkout</h1>

    <label for="first_name">First Name</label><br>
    <input type="text" name="first_name" id="first_name" value="<?= $first_name ?>" disabled>
    <br><br>

    <label for="last_name">Last Name</label><br>
    <input type="text" name="last_name" id="last_name" value="<?= $last_name ?>" disabled>
    <br><br>

    <label for="email">Email Address</label><br>
    <input type="email" name="email" id="email" value="<?= $email ?>" disabled>
    <br><br>

    <label for="phone">Phone Number</label><br>
    <input type="tel" name="phone" id="phone" value="<?= $phone ?>" disabled>
    <br><br>



    <form action="proses.php" method="post" id="form">
        <input type="hidden" name="json" id="json" value="">
        <button type="submit" id="pay-button">Pay!</button>
    </form>

    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function(e) {
            e.preventDefault();

            snap.pay('<?php echo $snap_token ?>', {
                onSuccess: function(result) {
                    handleRedirect(result);
                },
                onPending: function(result) {
                    handleRedirect(result);
                },
                onError: function(result) {
                    handleRedirect(result);
                }
            });
        }

        function handleRedirect(result) {
            const json = JSON.stringify(result, null, 0);

            const jsonInput = document.getElementById("json");
            const form = document.getElementById("form");

            jsonInput.value = json;
            form.submit();

            // window.location = "proses.php?jumlah=" + "" + "&json=" + json;
            // fetch("proses.php", {
            //     "method": "post",
            //     "headers": {
            //         "content-type": "application/json; charset=utf-8"
            //     },
            //     "body": json
            // });
        }
    </script>

    <?php include __DIR__ . "/../template/footer.php"; ?>
</body>

</html>