"use strict";

window.addEventListener("load", ()=>
{
    var form = document.getElementById("form");
    var main = document.getElementById("main");
    var array = [];

    var radio1 = document.getElementById("logros");
    var radio2 = document.getElementById("recompensas");
    var radio3 = document.getElementById("usuario");
    var radio4 = document.getElementById("ladder");
    var relleno = "<h2>Busqueda:</h2><input type='text' class='form-control form-control-lg' name='nombre' id='nombre'/><br><button type='submit' class='btn btn-dark btn-lg'>Enviar</button>";

    radio1.addEventListener("click", () => form.innerHTML = relleno);

    radio2.addEventListener("click", () => form.innerHTML = relleno);

    radio3.addEventListener("click", () => form.innerHTML = relleno);

    radio4.addEventListener("click", () => form.innerHTML = relleno);

    var obtenerDatos = ()=>
    {
        var nombre = document.getElementById("nombre").value;

        if(nombre.length >= 1)
        {
            if(radio1.checked == true)
            {
                fetch("https://us.api.blizzard.com/sc2/legacy/data/rewards/1?access_token=USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb")
                    .then(response => response.json())
                    .then(json =>{
                        array = json.portraits;
                        desplegarDatos(array);
                    });
            }else
            {
                if(radio2.checked == true)
                {
                    fetch("https://us.api.blizzard.com/sc2/legacy/data/achievements/1?access_token=USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb")
                        .then(response => response.json())
                        .then(json =>{
                            array = json.achievements;
                            desplegarDatos(array);
                        });
                }else
                {
                    if(radio3.checked == true)
                    {
                        fetch("https://us.api.blizzard.com/sc2/legacy/profile/1/2/"+ nombre +"?access_token=USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb")
                        .then(response => response.json())
                        .then(json =>{

                            obtenerUser(json);

                            //return obtenerUser(array);
                        });
                    }else{
                        fetch("https://us.api.blizzard.com/sc2/legacy/ladder/1/194163?access_token=USRWkDIy5lJPSg95TEj52u8W2JJvRvNwkb")
                            .then(response => response.json())
                            .then(json =>{
                                array = json.ladderMembers;

                                desplegarRanking(array);
                            })
                    }
                }
            }
        }else{
            alert("Ingrese los datos correspondientes");
        }

        var desplegarDatos = array =>
        {
            for(let i in array)
            {  
                if(nombre == array[i].title)
                {
                    form.style.display = "none";

                    let titulo = document.createElement("h2");
                    let imagen = document.createElement("img");
                    let par = document.createElement("p");
                    let url = array[i].icon.url;

                    titulo.innerHTML = i + ". " + JSON.stringify(array[i].title);
                    par.innerHTML = JSON.stringify(array[i].description);
                    imagen.src = url;
                    imagen.style.width = "400px";
                    imagen.style.height = "400px";
                    imagen.style.display = "block";
                    imagen.style.margin = "auto";
                    
                    main.append(titulo, par, imagen);

                    if(par.textContent == "undefined") par.style.display = "none";
                }
            }        
        };

        var desplegarRanking = array =>
        {
            for(let i in array)
            {
                if(nombre == array[i].character.displayName)
                {
                    form.style.display = "none";

                    let titulo = document.createElement("h2");
                    let id = document.createElement("h2");
                    
                    console.log(array[i]);
                }
            }
        };

        var obtenerUser = dato =>
        {
            form.style.display = "none";

            let titulo = document.createElement("h2");
            let id = document.createElement("h2");
            let imagen = document.createElement("img");
            let realm = document.createElement("p");
            let clanT = document.createElement("p");
            let clanN = document.createElement("p");
            let raza = document.createElement("p");
            let rango1 = document.createElement("p");
            let rangoMas = document.createElement("p");

            titulo.innerHTML = "<b>Nombre del usuario:</b> " + JSON.stringify(dato.displayName);
            id.innerHTML = "<b>ID del usuario:</b> #" + JSON.stringify(dato.id);
            imagen.innerHTML = dato.portrait.url;
            realm.innerHTML = "<b>Realm:</b> " + JSON.stringify(dato.realm);
            clanN.innerHTML = "<b>Nombre del Clan:</b> " + JSON.stringify(dato.clanName);
            clanT.innerHTML = "<b>Nombre del Clan:</b> " + JSON.stringify(dato.clanTag);
            raza.innerHTML = "<b>Raza Primaria:</b> " + JSON.stringify(dato.career.primaryRace);
            rango1.innerHTML = "<b>Rango 1V1 más alto:</b> " + JSON.stringify(dato.career.highest1v1Rank);
            rangoMas.innerHTML = "<b>Rango de Equipo más alto: <b>" + JSON.stringify(dato.career.highestTeamRank);
            
            imagen.style.width = "400px";
            imagen.style.height = "400px";

            main.append(titulo, id, imagen, realm, clanN, clanT, raza, rango1, rangoMas);
        };

    };

    form.addEventListener("submit", obtenerDatos);
});