<?php 
ini_set('display_errors', 1);
ini_set('display_status_errors', 1);
error_reporting(E_ALL);

include '../connexiondb.php';
$conn = connexionMysqli();

$response = ['success' => false];

if (isset($_SESSION["client_id"])) {
    $client_id = $_SESSION["client_id"];
    $sql = "SELECT c.numero_compte, c.type_compte, c.solde 
           FROM comptes c
           JOIN clients cl ON c.client_id = cl.client_id
           WHERE cl.client_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $client_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
?>
<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget rounded shadow p-3 text-center">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <i class="fa fa-wallet fa-5x text-success"></i>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php echo $row['solde']; ?></div>
                    <div class="text-muted">solde</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget rounded shadow p-3 text-center">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <i class="fa fa-credit-card fa-5x text-success"></i>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php echo $row['numero_compte']; ?></div>
                    <div class="text-muted">numero compte</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget rounded shadow p-3 text-center">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <i class="fa fa-dollar fa-5x text-success"></i>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php echo $row['type_compte']; ?></div>
                    <div class="text-muted">type compte</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget rounded shadow p-3 text-center">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <i class="fas fa-money-bill-alt fa-5x text-success"></i>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large">25.2k</div>
                    <div class="text-muted">crédit</div>
                </div>
            </div>
        </div>
    </div>
</div><!--/.row-->
<?php
        }
    } else {
        echo "Aucune donnée trouvée.";
    }
} else {
    $response['message'] = "Vous devez être connecté pour accéder à cette page.";
    echo json_encode($response);
}
?>