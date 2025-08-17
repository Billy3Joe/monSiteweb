
  <body>
    <!-- navbar -->
    <!-- <nav class="navbar">
      <h4>Dashboard</h4>
      <div class="profile">
        <span class="fas fa-search"></span>
        <img class="profile-image" alt="no avaible image" src="https://pbs.twimg.com/media/FREwdOLXEAQXJ22.jpg:large">
        <p class="profile-name">Lorem ipsum</p>    
      </div>
    </nav> -->

    <!-- sidebar -->
    <!--<input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle"><span class="fas fa-bars"></span></label>

    <div class="sidebar">
      <div class="sidebar-menu">
        <span class="fas fa-clipboard-list"></span><p>Dashboard</p>
      </div>
      <div class="sidebar-menu">
        <span class="fas fa-users"></span><p>Utilisateurs</p>
      </div>
      <div class="sidebar-menu">
        <span class="fas fa-credit-card"></span><p>Payement</p>
      </div>
      <div class="sidebar-menu">
        <span class="fas fa-chart-line"></span><p>Statistic</p>
      </div>
      <div class="sidebar-menu">
        <span class="fas fa-id-card"></span><p>Contact</p>
      </div>
      <div class="sidebar-menu">
        <span class="fas fa-cog"></span><p>Paramètre</p>
      </div>
    </div> -->

    <!-- main dahsboard -->
    <main>
      <div class="dashboard-container">
        <!-- 4 cards top -->
        <div class="card total1">
          <div class="info">
            <div class="info-detail">
              <?php 
                // Créer une instance de AdministrateurManager
                $administrateurManager = new AdministrateurManager();
                
                // Récupérer le nombre total de services
                $nombreServices = $administrateurManager->getNombreServices();
                ?>
                <h3>Services</h3>
                <?php echo $nombreServices; ?>
            </div>
            <div class="info-image"><i class="fas fa-cogs"></i></div>
          </div>
        </div>
        
        <div class="card total2">          
            <div class="info">
                <div class="info-detail">
                   <?php 
                    // Créer une instance de AdministrateurManager
                    $administrateurManager = new AdministrateurManager();
                    
                    // Récupérer le nombre total de messages
                    $nombreMessages = $administrateurManager->getNombreMessages();
                    ?>
                    <h3>Messages</h3>
                    <?php echo $nombreMessages; ?>
                </div>
                <div class="info-image"><i class="fas fa-envelope"></i></div>
            </div>
        </div>

        <div class="card total3">
          <div class="info">
            <div class="info-detail"> 
                <?php 
                // Créer une instance de AdministrateurManager
                $administrateurManager = new AdministrateurManager();
                
                // Récupérer le nombre total d'utilisateurs
                $nombreUtilisateurs = $administrateurManager->getNombreUtilisateurs();
                ?>
                <h3>Utilisateurs</h3>
                <?php echo $nombreUtilisateurs;?>
            </div>
            <div class="info-image"><i class="fas fa-user-friends"></i></div>
          </div>
        </div>

        <div class="card total4">
          <div class="info">
            <div class="info-detail"> 
                <?php 
                // Créer une instance de AdministrateurManager
                $administrateurManager = new AdministrateurManager();
                
                // Récupérer le nombre total d'expériences
                $nombreExperiences = $administrateurManager->getNombreExperiences();
                ?>
                <h3>Expérineces</h3>
                <?php echo $nombreExperiences;?>
            </div>
            <div class="info-image"><i class="fas fa-briefcase"></i></div>
          </div>
        </div>
        

        <div class="card total5">          
          <div class="info">
            <div class="info-detail">
              <h3>Avis</h3>
              <?php 
            // Créer une instance de AdministrateurManager
            $administrateurManager = new AdministrateurManager();
            
            // Récupérer le nombre total des avs
            $nombreTemoignages = $administrateurManager->nombreTemoignages();
            ?>
            <?php echo $nombreTemoignages;?>  
            </div>
            <div class="info-image"><i class="fas fa-star"></i></div>
          </div>
        </div>
    </main>
<style>
    *{
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
}

body{
  background-color: #f4f4fb;
}

/*------------------------------*/
main{
  min-height: 100%;
  color: #201f2b;
}

.dashboard-container {
  display: flex;
  flex-wrap: wrap;  /* <-- permet aux éléments de passer à la ligne */
  gap: 1.5rem;      /* espace entre les cartes */
  justify-content: center; /* centre les éléments horizontalement */
}


.card{
  background-color: #fff;
  padding: 1rem;
  border-radius: 10px;
}

.total1{
  background-color: #808000;
  color: #fff;
  transition: all 1s ease-in;
}

.total2{
  background-color: #808000;
  color: #fff;
  transition: all 1s ease-in;
}

.total3{
  background-color: #808000;
  color: #fff;
  transition: all 1s ease-in;
}

.total4{
  background-color: #808000;
  color: #fff;
  transition: all 1s ease-in;
}

.total5{
  background-color: #808000;
  color: #fff;
  transition: all 1s ease-in;
}

.total1:hover{
  background-color: #fff;
  color: #808000;
  border: 1px solid #808000;
}

.total2:hover{
  background-color: #fff;
  color: #808000;
  border: 1px solid #808000;
}

.total3:hover{
  background-color: #fff;
  color: #808000;
  border: 1px solid #808000;
}

.total4:hover{
  background-color: #fff;
  color: #808000;
  border: 1px solid #808000;
}

.total5:hover{
  background-color: #fff;
  color: #808000;
  border: 1px solid #808000;
}


.detail{
  grid-area: detail;
  overflow-x: auto;
}

.customer{
  grid-area: customer;
  overflow-x: auto;
}

.info{
  display: grid;
  grid-auto-flow: column;
  justify-items: space-between;
  align-items: center;
}

.info-detail h2 {
  font-size: 24px;
}

.info-detail p {
  font-size: 14px;
}

.info-image{
  font-size: 50px;
  color: #fff;
}

.detail-header{
  display: grid;
  grid-auto-flow: column;
  justify-items: space-between;
  align-items: center;  
}

.detail-header button{
  height: 30px;
  width: 120px;
  border: 1px solid #2d2b98;
    background-color: #808000;
  color:#f2f2f2;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.2s ease-in;
}

.detail-header button:hover{
  background-color: transparent;
  color: #2d2b98;
}

.detail table{
  width: 100%;
  border-collapse: collapse;
}

.detail table tr:nth-child(odd){
  background-color: #f8f8fb;
}

.detail table tr{
  background-color: #f4f4fb;
}

.detail table th, 
.detail table td{
  padding: 0.8rem 0.2rem;
  text-align: left;
  min-width: 120px;
  font-size: 14px;
}

.detail table tr:hover{
  background-color: #f2f2f2;
  border-bottom: 2px solid #2d2d98;
}

.detail table tr td:nth-child(2), .detail table tr td:nth-child(3){
  min-width: 150px;
}

.customer-wrapper {
  display: grid;
  grid-template-columns: 0.3fr 1fr 0.4fr;
  grid-auto-flow: column;
  margin: 10px 0;
  min-width: 230px;
  align-items: flex-start;
  gap: 5px;
}

.customer-image {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  object-fit: cover;
}

.customer-name > p, 
.customer-date{
  font-size: 0.9rem;
}

.customer-date{
  text-align: right;
  color: #9092a9;
}

/* make a responsive */

@media screen and (max-width: 1070px) {

  .dashboard-container{
    display: grid;
    grid-template-columns: 1fr 1fr; 
    grid-template-areas: 
    "total1 total2 "
    "total3 total4"
    "detail detail"
    "customer customer";
  }  

}

@media screen and (max-width: 630px) {

  .profile-name{
    display: none;
  }

  .sidebar{
    display: none;
  }

  main{
    padding: 6rem 2rem 2rem 2rem;
  }

  #toggle:checked ~ .sidebar{
      width: 200px;
      display: block;
  }

  #toggle:checked ~ .sidebar .sidebar-menu > p {
    display: block;
  }

  #toggle:checked ~ main {
    padding: 6rem 2rem 2rem 2rem;
  }

  .dashboard-container{
    display: grid;
    grid-template-columns: 1fr; 
    grid-template-areas: 
    "total1"
    "total2"
    "total3"
    "total4"
    "detail"
    "customer";
  } 
  .detail table {
    font-size: 0.9rem;
  }
}
</style>