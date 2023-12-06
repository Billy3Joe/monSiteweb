
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
                <p>Reçus</p>
                <h2><?php echo $nombreServices; ?> <span>Services</span></h2>
            </div>
            <div class="info-image"><i class="fas fa-money-check-alt"></i></div>
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
                    <p>Reçus</p>
                    <h2><?php echo $nombreMessages; ?> <span>Messages</span></h2>
                </div>
                <div class="info-image"><i class="fas fa-boxes"></i></div>
            </div>
        </div>

        <div class="card total3">
          <div class="info">
            <div class="info-detail"> 
                <?php 
                // Créer une instance de AdministrateurManager
                $administrateurManager = new AdministrateurManager();
                
                // Récupérer le nombre total de messages
                $nombreUtilisateurs = $administrateurManager->getNombreUtilisateurs();
                ?>
              <p>Nombre</p>
              <h2><?php echo $nombreUtilisateurs;?> <span>Utilisateurs</span></h2>
            </div>
            <div class="info-image"><i class="fas fa-user-friends"></i></div>
          </div>
        </div>

        <div class="card total4">          
          <div class="info">
            <div class="info-detail">
              <h3>Commentaires</h3>
              <p>Nombre</p>
              <h2>5 <span>Commentaires</span></h2>
            </div>
            <div class="info-image"><i class="fas fa-shipping-fast"></i></div>
          </div>
        </div>

        <!-- 2 cards bottom -->
        <div class="card detail">
          <div class="detail-header">
            <h2>Derniers commentaires</h2>
            <button> See More</button>         
          </div>
          <table>
            <tr>
              <th>Identifiants</th>
              <th>Mes Posts</th>
              <th>Commentaires</th>
              <th>Activer/Désactiver</th>
              <th>Supprimer</th>
              <th>Détails</th>
            </tr>
            <tr>
              <td>#PW-0001</td>
              <td>Potential Corp</td>
              <td><span class="status onprogress"><i class="fas fa-circle"> ONPROGRESS</i></span></td>
              <td>3,148.19 USD</td>
              <td>Apr 11, 2021</td>
              <td>Today</td>
            </tr>
            <tr>
              <td>#PW-0002</td>
              <td>Webcode inc</td>
              <td><span class="status confirmed"><i class="fas fa-circle"> CONFIRMED</i></span></td>
              <td>830.78 USD</td>
              <td>Mar 29, 2021</td>
              <td>Yesteday</td>
            </tr>
            <tr>
              <td>#PW-0003</td>
              <td>Codding time</td>
              <td><span class="status fulfilled"><i class="fas fa-circle"> FULFILLED</i></span></td>
              <td>928.81 USD</td>
              <td>Feb 10, 2020</td>
              <td>Feb 21, 2021</td>
            </tr>
            <tr>
              <td>#PW-0004</td>
              <td>Microsoft</td>
              <td><span class="status fulfilled"><i class="fas fa-circle"> FULFILLED</i></span></td>
              <td>6,239.53 USD</td>
              <td>Dec 11, 2020</td>
              <td>Jan 23, 2021</td>
            </tr>
            <tr>
              <td>#PW-0005</td>
              <td>Apple inc</td>
              <td><span class="status confirmed"><i class="fas fa-circle"> CONFIRMED</i></span></td>
              <td>187.13 USD</td>
              <td>Nov 20, 2020</td>
              <td>Jan 09, 2021</td>
            </tr>
            <tr>
              <td>#PW-0006</td>
              <td>Penerang</td>
              <td><span class="status onprogress"><i class="fas fa-circle"> ONPROGRESS</i></span></td>
              <td>624.65 USD</td>
              <td>Nov 01, 2020</td>
              <td>Dec 15, 2020</td>
            </tr>
            <tr>
              <td>#PW-0007</td>
              <td>Paralon Corp</td>
              <td><span class="status confirmed"><i class="fas fa-circle"> CONFIRMED</i></span></td>
              <td>2,483.09 USD</td>
              <td>Oct 13, 2020</td>
              <td>Oct 21, 2020</td>
            </tr>
            <tr>
              <td>#PW-0008</td>
              <td>Coding Scale</td>
              <td><span class="status onprogress"><i class="fas fa-circle"> ONPROGRESS</i></span></td>
              <td>1,247.00 USD</td>
              <td>Sep 20, 2020</td>
              <td>Oct 13, 2020</td>
            </tr>
          </table>
        </div>

            <div class="card customer">
            <h2>Sales Activities</h2>
           
            </div>
        </div>
    </main>
<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  outline: none;
  font-family: "Poppins", sans-serif;
}

body{
  background-color: #f4f4fb;
}

/*------------------------------*/
.profile{
  display: flex;
  width: 32%;
  max-width: 200px;
  justify-content: space-around;
  align-items: center;
}

.profile-image{  
  width: 30px;
  height: 30px;
  object-fit: cover;
  border-radius: 50%;
}

.profile-name{
  font-size: 0.9rem;
  margin-left: -20px;
}

.side-toggle{
  position: fixed;
  z-index: 2;
  top: 12.5px;
  left: 25px;
  float: right;
  font-size: 20px;
  cursor: pointer;
}

#toggle {
  display: none;
}

#toggle:checked ~ main{
  padding: 6rem 2rem 2rem 6rem;
}

/*------------------------------*/
main{
  min-height: 100%;
  padding: 6rem 1rem 2rem 14rem;
  color: #201f2b;
}

.dashboard-container{
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 0.5fr 0.5fr; 
  grid-template-rows: auto;
  gap: 1rem;
  grid-template-areas: 
  "total1 total2 total3 total4 total4"
  "detail detail detail customer customer"
  "detail detail detail customer customer";
}

.card{
  background-color: #fff;
  padding: 1rem;
  border-radius: 10px;
}

.total1{
  grid-area: total1;
  background-color: #2d2b98;
  color: #fff;
  transition: all 1s ease-in;
}

.total2{
  grid-area: total2;
  background-color: #2d2b98;
  color: #fff;
  transition: all 1s ease-in;
}

.total3{
  grid-area: total3;
  background-color: #2d2b98;
  color: #fff;
  transition: all 1s ease-in;
}

.total4{
  grid-area: total4;
  background-color: #2d2b98;
  color: #fff;
  transition: all 1s ease-in;
}

.total1:hover{
  background-color: #fff;
  color: #2d2b98;
  border: 1px solid #2d2b98;
}

.total2:hover{
  background-color: #fff;
  color: #2d2b98;
  border: 1px solid #2d2b98;
}

.total3:hover{
  background-color: #fff;
  color: #2d2b98;
  border: 1px solid #2d2b98;
}

.total4:hover{
  background-color: #fff;
  color: #2d2b98;
  border: 1px solid #2d2b98;
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
  color: #2d2b98;
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
  background-color: #2d2b98;
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

.status {
  padding: 0.3rem 1rem;
  border-radius: 30px;
  font-weight: 600;
  letter-spacing: 1;
  font-size: 0.7rem;
}

.onprogress{
  background-color: #fff2d7;
  color: #ffa705;
}

.confirmed{
  background-color: #d7effc;
  color: #15a1fe;
}

.fulfilled{
  background-color: #dcedde;
  color: #37aa38;
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