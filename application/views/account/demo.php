<style>
    #editor {
        height: 175px
    }

    .le-checkbox {
        appearance: none;
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        background-color: #F44336;
        width: 30px;
        height: 30px;
        border-radius: 40px;
        margin: 0px;
        outline: none;
        transition: background-color .5s;
    }

    .le-checkbox:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%) rotate(
            45deg
        );
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

    .le-checkbox:after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%) rotate(
            -45deg
        );
        background-color: #ffffff;
        width: 20px;
        height: 5px;
        border-radius: 40px;
        transition: all .5s;
    }

</style>
<div class="tab-content" id="profileTabContent">
    <div class="tab-pane fade active show">
        <div class="row text-center">
            <div class="col-6">
                <h4 class="text-theme"><strong>Patient ID: </strong>123</h4>
            </div>
            <div class="col-6">
                <h4 class="text-theme"><strong>Major disease: </strong>Fever</h4>
            </div>
        </div>
        <hr>
        <h4 class="text-theme"><span class="fa fa-support text-16 mr-1"></span> Patient Details</h4>
        <div class="row">


            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Name</h5>
                <span>Patient 1</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Age</h5>
                <span>50 years</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Weight</h5>
                <span>80kg</span>
            </div>
            <div class="mb-4 col-md-4 col-lg-3 col-sm-6">
                <h5 class="mb-1 text-theme">Temperature</h5>
                <span>95</span>
            </div>


        </div>
        <hr>

        <h4 class="text-theme"><span class="fa fa-map-marker-alt text-16 mr-1"></span> Prescription Details</h4>
        <div class="row">
            <div class="mb-4 col-md-4 col-lg-6 col-sm-6">
<!--                <h5 class="mb-1 text-theme">Prescription</h5>-->
                <span> When you get a new prescription from your doctor, you may not be able to decipher what is written on it. Many people blame this on the fact that physicians are notorious for poor handwriting.</span>
            </div>

        </div>
        <hr>





    </div>
</div>




<!--</div>-->

