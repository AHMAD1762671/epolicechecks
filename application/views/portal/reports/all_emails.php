<!--<form>-->
<!--    <div class="row mb-3">-->
<!--        <div class="col-sm-3 mt-3 mt-md-0">-->
<!--            <input type="date" value="--><?//= $client_id ?><!--" name="start_date" class="form-control" placeholder="Start Date">-->
<!--        </div>-->
<!--        <div class="col-sm-3 mt-3 mt-md-0">-->
<!--            <input type="date" value="--><?//= $name ?><!--" name="end_date" class="form-control" placeholder="End Date">-->
<!--        </div>-->
<!--        <div class="col-sm-2 mt-3 mt-md-0">-->
<!--            <button type="submit" class="btn btn-primary btn-block">Search</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</form>-->







<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="table-responsive">
            <table class="display table table-bordered">
                <thead>
                <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Email Id</th>
<!--                    <th scope="col">Delivery Method Price</th>-->
<!--                    <th scope="col">Sub Total</th>-->
<!---->
<!--                    <th scope="col">Tax</th>-->
<!--                    <th scope="col">Grand Total</th>-->
<!--                    <th scope="col">Payment Status</th>-->
<!--                    <th scope="col">Application Type</th>-->
<!--                    <th scope="col">Created At</th>-->
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">zainulabaidinz@gmail.com	</td>

                </tr>

                <tr>
                    <td class="align-middle">2</td>
                    <td class="align-middle">corporate@gmail.com</td>

                </tr>

                <tr>
                    <td class="align-middle">3</td>
                    <td class="align-middle">sub_corporate@gmail.com	</td>
                </tr>
                <tr>
                    <td class="align-middle">4</td>
                    <td class="align-middle">corporate2@gmail.com	</td>
                </tr>
                <tr>
                    <td class="align-middle">5</td>
                    <td class="align-middle">admin@epolicegac.com	</td>
                </tr>



                </tbody>
            </table>
        </div>
        <?php echo $this->paginator->get_links(); ?>

    </div>
</div>