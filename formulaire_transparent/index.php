<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css"/>
    <title> Formulaire transparent </title>
   
</head>
<body>
    <div class="container">
        <nav>
            <a href="" class="logo">Airmusicien</a>
            <ul>
                <li><a href="page_contact.php">nous contacter</a></li>
                
                <li>
                    <form action="page_a_propos.html">
                    <button class="btn" id="displayform">à propos</button>
                </form>
                </li> 
            </ul>
        </nav>

        <section>
            <div class="sec-container">
                <div class="card">
                    <div class="card-header">
                        <div id="forlogin" class="form-header active ">Se connecter</div>
                        <div id="forRegister" class="form-header">S'inscrire</div>
                    </div>

                    <div class="card-body" id="formContainer">

                        <form action="verification_connexion.php"  method="POST" id="loginForm">
                            <input type="text" class="form-control" placeholder="@Utilisateur"/>
                            <input type="passeword" class="form-control" placeholder="@Mot de passe"/>
                            <button class="formButton">Connexion</button>
                        </form>


                        <form action="verification_inscription.php" method="POST" id="registerForm" class="toggleForm">
                            <input type="email" class="form-control" placeholder="@email"/>
                           
                            <input type="text" class="form-control" placeholder="@Utilisateur"/>
                           
                            

                            <p style="font-size: 12px; color:#fff; font-weight: lighter;">Mon instrument/rôle : </p>
                           
                <select name = "instruments/rôle" class="form-control">
                  
                    <option style="color:black" value="La voix"> ma voix</option>
                    <option style="color:black" value ="Le piano"> le piano</option>
                    <option style="color:black" value ="La guitare "> la guitare</option>
                    <option style="color:black" value ="La flûte à bec"> la flûte à bec</option>
                    <option style="color:black" value ="La batterie"> la batterie</option>
                    <option style="color:black" value ="Le violon">  le violon</option>
                    <option style="color:black" value ="La trompette"> la trompette</option>
                    <option style="color:black" value ="Le saxophone"> le saxophone</option>
                    <option style="color:black" value ="L'harmonica"> l'harmonica</option>
                    <option style="color:black" value ="La basse"> la basse</option>
                    <option style="color:black" value ="Beatmaker"> Beatmaker</option>
                    <option style="color:black" value ="Producteur">Producteur</option>
                    <option style="color:black" value ="Ingénieur du son"> Ingénieur du son</option>
                    </select>
                    
                    <p style="font-size: 12px; color: #fff; font-weight: lighter;">Mon genre musical :</p>
                    
                    
                    <select name = "genre musical" class="form-control">
                        <option style="color:black" value ="Le blues"> le blues </option>
                        <option style="color:black" value ="Le métal">le métal</option>
                        <option style="color:black" value ="Le classique "> la musique classique </option>
                        <option style="color:black" value ="La country"> la country</option>
                        <option style="color:black" value ="Le rock"> le rock</option>
                        <option style="color:black" value ="Le funk"> le funk </option>
                        <option style="color:black"  value ="Le reggea"> le reggea</option>
                        <option style="color:black" value ="Le rap/rnb"> le saxophone</option>
                        <option style="color:black" value ="Le jazz"> le jazz</option>
                        <option style="color:black" value ="La pop/électro"> la pop/l'électro</option>
                        </select>
                    
                            <input type="passeword" class="form-control" placeholder="@Mot de passe"/>
                            <input type="passeword" class="form-control" placeholder="@Confirmer mot de passe"/>


                            
                            <button class="formButton" type="submit">Inscription</button>
                        </form>
                    
                        

                    </div> 
                </div>
            </div>
        </section>
    </div>
    <script> 
    const displayform =_('displayform');
    const forlogin =_('forlogin'); 
    const loginForm =_('loginForm');
    const forRegister =_('forRegister');
    const registerForm =_('registerForm');
    const formContainer =_('formContainer'); 
    displayform.addEventListener('click',showForm);

        forlogin.addEventListener('click', () =>{
            forlogin.classList.add('active')
        forRegister.classList.remove('active')
        if(loginForm.classList.contains('toggleForm')){
            formContainer.style.transform = 'translate(0%)'; 
            formContainer.style.transition = 'transform .7s';
            registerForm.classList.add('toggleForm');
            loginForm.classList.remove('toggleForm');

        }

        })


    forRegister.addEventListener('click',()=>{
        forlogin.classList.remove('active')
        forRegister.classList.add('active')
        if(registerForm.classList.contains('toggleForm')){
            formContainer.style.transform = 'translate(-100%)'; 
            formContainer.style.transition = 'transform .7s';
            registerForm.classList.remove('toggleForm');
            loginForm.classList.add('toggleForm');

        }
    })
    

    function _(e){
        return document.getElementById(e); 

    }

    function showForm(){
        document.querySelector('.form-wrapper .card').classList.toggle('show');
    }
    </script>
</body>
 
</html>