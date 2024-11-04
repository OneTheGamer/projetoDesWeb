(function(){
    const $ = q => document.querySelector(q);
 
    function convertPeriod(mil) {
        var min = Math.floor(mil / 60000);
        var sec = Math.floor((mil % 60000) / 1000);
        return `${min}m e ${sec}s`;
    };
 
    function renderGarage () {
        const garage = getGarage();
        $("#garage").innerHTML = "";
        garage.forEach((c, index) => addCarToGarage(c, index))
    };
 
    function addCarToGarage (car, index) {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${car.name}</td>
            <td>${car.licence}</td>
            <td data-time="${car.time}">
                ${new Date(car.time)
                        .toLocaleString('pt-BR', { 
                            hour: 'numeric', minute: 'numeric' 
                })}
            </td>
            <td>
                <button class="edit" value="${index}">EDITAR</button>
                <button class="delete">X</button>
            </td>
        `;
 
        $("#garage").appendChild(row);
    };
 
    function checkOut(info) {
        let period = new Date() - new Date(info[2].dataset.time);
        period = convertPeriod(period);
 
        const licence = info[1].textContent;
        const msg = `O veículo ${info[0].textContent} de placa ${licence} permaneceu ${period} estacionado. \n\n Deseja encerrar?`;
 
        if(!confirm(msg)) return;
        
        const garage = getGarage().filter(c => c.licence !== licence);
        localStorage.garage = JSON.stringify(garage);
        
        renderGarage();
    };

    let editCar = null;
    function edit(index) {
        const garage = getGarage();
        const name = garage[index].name;
        const licence = garage[index].licence;
        const time = new Date(garage[index].time);
        editCar = index;

        $("#name").value = name;
        $("#licence").value = licence;
        $("#send").innerHTML = "Atualizar";
        
        
        //const garage = getGarage().filter(c => c.licence !== licence);
        //localStorage.garage = JSON.stringify(garage);
        
        //renderGarage();
    };
 
    const getGarage = () => localStorage.garage ? JSON.parse(localStorage.garage) : [];
 
    renderGarage();
    $("#send").addEventListener("click", e => {
        const name = $("#name").value;
        const licence = $("#licence").value;
 
        if(!name || !licence){
            alert("Os campos são obrigatórios.");
            return;
        }   
 
        const card = { name, licence, time: new Date() };
 
        const garage = getGarage();

        if(editCar === null){
            garage.push(card);
        } else {
            garage[editCar].name = name;
            garage[editCar].licence = licence; 
            editCar = null; 
            $("#send").innerHTML = "Registrar";
        }
        
 
        localStorage.garage = JSON.stringify(garage);
 
        renderGarage();
        $("#name").value = "";
        $("#licence").value = "";
    });
 
    $("#garage").addEventListener("click", (e) => {
        if(e.target.className === "delete")
            checkOut(e.target.parentElement.parentElement.cells);
        if(e.target.className === "edit")
            edit(e.target.value);
    });
 })()
 const menuToggle = document.querySelector('.menu-toggle');
const navegaion = document.querySelector('.navegation');

menuToggle.addEventListener('click', () => {
    navegaion.classList.toggle('active'); // Alterna a classe 'active'
});