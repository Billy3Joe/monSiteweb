<section class="breweries" id="breweries">
    <div style="background-color: #f7f7f7 !important;">
      <h4 class="text-center mb-4 display-2" style="font-weight: bold; font-size:50px;"><span class="underline-yellow">Travail en vedette</span></h4>
      <p class="text-center">Des expériences qui comptent</p>
    </div>
    
    <div class="container">
      <div class="row">
          <?php foreach ($mobileApps as $mobileApp) : ?>
              <div class="col-md-4 mb-4">
                  <div class="card">
                      <img src="<?php echo $mobileApp['image']; ?>" class="card-img-top" alt="<?php echo $mobileApp['title']; ?>">
                      <div class="card-body">
                          <h5 class="card-title"><?php echo $mobileApp['title']; ?></h5>
                          <p class="card-text"><?php echo $mobileApp['description']; ?></p>
                      </div>
                  </div>
              </div>
          <?php endforeach; ?>
      </div>
   </div>
  </section>