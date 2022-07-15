<!--<style>
    .text-theme{
        color: #13375C;
    }
    .pr-5{
        padding-right: 25px;
    }
    .float-right{
        float: right;
    }
</style>

<table style="width: 100%;">
    <thead>
        <tr>
            <td style="width: 25%"></td>
            <td style="width: 25%"></td>
            <td style="width: 25%"></td>
            <td style="width: 25%"></td>
        </tr>
        <tr>
            <td colspan="2" class="text-theme"><strong>Client ID: </strong><?= $application->name_based_application_id ?></td>
            <td colspan="2" class="text-theme"><strong>State: </strong><?= get_state_name_by_id($application->state_id) ?></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="4"><h3>Requested Services</h3></td> 
        </tr>
        <?php foreach ($services as $value) { ?>
            <tr>
                <td><span class="pr-5"><?= $value->subservice_name ?></span> </td>
                <td><span class="float-right"><?= $value->service_price ?> CAD</span></td>
            </tr>
        <?php } ?>
        <tr><td><h4 class="text-theme">Delivery Details</h4></td></tr>
        <tr>
            <td><h5 class="mb-1 text-theme">Name</h5>
                <span><?= $application->delivery_name ?></span></td>
        <td><h5 class="mb-1 text-theme">Address</h5>
        <span><?= $application->delivery_address ?></span></td>
        <td><h5 class="mb-1 text-theme">City</h5>
                <span><?= $application->delivery_city ?></span></td>
        <td><h5 class="mb-1 text-theme">Province</h5>
                <span><?= $application->delivery_state ?></span></td>
        </tr>
        <tr>
            <td><h5 class="mb-1 text-theme">Country</h5>
                <span><?= $application->delivery_country ?></span></td>
            <td><h5 class="mb-1 text-theme">Phone</h5>
                <span><?= $application->delivery_phone ?></span></td>
            <td><h5 class="mb-1 text-theme">Email</h5>
                <span><?= $application->delivery_email ?></span></td>
            <td><h5 class="mb-1 text-theme">Delivery Method</h5>
                <span class="pr-5"><?= get_delivery_method_name_by_id($application->delivery_method_id) ?></span> <span><strong><?= $application->delivery_method_price ?> CAD</strong></span></td>
        </tr>
</tbody>
</table>-->