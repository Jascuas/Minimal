<!--Footer-->

<footer class="pt-4 font-small @if(isset($welcome)) page-footer @endif" style="border-top: 1px solid rgba(0, 0, 0, .1);">
    
    <!--Footer Links-->
    <div class="container  mb-2 text-center text-md-center">

        <div class="row">
            <!--First column-->
            <div class="col-6 col-md-3 col-lg-3 col-xl-3">

                <a>Sobre nosotros</a>

                <hr class=" mb-2 mt-2 mx-auto linea">
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-6 col-md-3 col-lg-3 col-xl-3 ">
                <a> Politica de privacidad</a>
                <hr class=" mb-2 mt-2 mx-auto linea">
            </div>
            <!--/.Second column-->

            <!--Third column-->
            <div class="col-6 col-md-3 col-lg-3 col-xl-3 ">

                <a>Terminos y condiciones</a>

                <hr class=" mb-2 mt-2 mx-auto linea">
            </div>
            <!--/.Third column-->

            <!--Fourth column-->
            <div class="col-6 col-md-3 col-lg-3 col-xl-3 ">

                <a>Contacto</a>

                <hr class=" mb-2 mt-2 mx-auto linea">
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-2 text-center @if(!isset($welcome)) mdb-color lighten-3 @endif ">
        © 2018 Copyright:
        <a class="white-text" href="#"> Minimal.com </a>
    </div>
    <!--/Copyright-->

</footer>
<!--/.Footer-->