<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<style>
    .abc:hover
    {
        background-color: #d8dcbf!important;
        border-radius: 20px
    }

    /* Popup container - can be anything you want */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
        visibility: hidden;
        width: 360px;
        background-color: red;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
        font-style:bold;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: red transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {opacity: 0;} 
        to {opacity: 1;}
    }

    @keyframes fadeIn {
        from {opacity: 0;}
        to {opacity:1 ;}
    }
</style>
<div class="row">
    <div class="col-sm-12 text-center">
        <img src="<?= base_url('site-assets') ?>/images/Logo_epolicecheckfinal-02.png" style="height: 200px; width: 343px;">
    </div>
</div>
<div class="row ">
    <div class="col-sm-2">

    </div>

    <div class="col-sm-8 text-dark  bg-white">

        <h5 class="text-dark">Select one of the following</h5>
        <hr>

    </div>
    <div class="col-sm-1  ">

    </div>
</div>
<div class="row" style="margin-bottom: 70px;">
    <div class="col-sm-2">

    </div>

    <div class="col-sm-4 text-dark bg-white text-center abc " style=" border: 1px solid #d1d4db;

         border-bottom: 4px solid #c1d72f;">
        <a href="<?= base_url() ?>us-entry-waiver/canada">
            <img src="<?= base_url('site-assets') ?>/images/Canadian.gif" class="mt-5 mb-2 " style="height: 139px; width: i35px;  ">
            <h5 class="mt-3">CANADA</h5>
            <p>I am currently residing in Canada </p>
        </a>

    </div>
    <div class="col-sm-4 text-dark  bg-white text-center abc popup" style="margin-left: 10px; border: 1px solid #d1d4db;

         border-bottom: 4px solid #c1d72f;" onclick="myFunction()">
        <a href="#">
            <img src="<?= base_url('site-assets') ?>/images/map.png" class="mt-5 mb-2 " style="height: 139px; width: 135px;  ">
            <h5 class="mt-3">INTERNATIONAL</h5>
            <p>I am currently residing in a foreign country </p>
            <span class="popuptext" id="myPopup">Connect your nearest consulate US Embassy</span>
        </a>
    </div>
    <div class="col-sm-2  ">

    </div>
</div>

<script>
    // When the user clicks on div, open the popup
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>