<div class="page-breadcrumb">
    <div class="row">
      <div class="col-7 align-self-center">
        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">
          <?php 
          echo date("l");
          date_default_timezone_set("Asia/Jakarta");
          $a = date ("H");
          if (($a>=6) && ($a<=11)) {
              echo " Morning :)";
          }else if(($a>=11) && ($a<=15)){
              echo " Afternoon :)";
          }elseif(($a>15) && ($a<=18)){
              echo " Evening :)";
          }else{
              echo " Night :)";
          }
          ?>
        </h3>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0 p-0">
              <li class="breadcrumb-item" style="font-size: 17px"><a href="index.html">{{ $titleheader }}</a></li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="col-5 align-self-center">
        <div class="customize-input float-right">
          <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
            <option selected><?= date("F, d") ?></option>
          </select>
      </div>
    </div>
  </div>