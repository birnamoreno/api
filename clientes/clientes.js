class Clientes {

    getDataCliente = async (idCliente) => {
        let url = `http://127.0.0.1:8080/_soa/api_res/controller/ClientesController.php`;
        if (idCliente != null) url += `?idCliente=${idCliente}`;
        try {
            let consulta = await fetch(url);
            let data = await consulta.json();
            console.log(data);
            let datSet = this.setTableCliente(data);
            this.dataTable(datSet);
        } catch (error) {
            console.log(error);
        }
    }

    setTableCliente = (data) => {
        const dataSet = [];
        data.map(item => {
            let row = [];
            row.push(item.idCliente);
            row.push(item.nombreCliente);
            row.push(item.apellidosCliente);
            row.push(item.CiudadCliente);
            row.push(item.municipioCliente);

            row.push(`<button class='btn btn-primary'  onclick="Clientes.mostarDatelleCliente(${item.idCliente})"><i class='fas fa-hand-peace'></i> </button>
                    <button class='btn btn-danger  ' onclick="Clientes.mostarDatelleCliente(${item.idCliente})"><i class='fas fa-trash'></i> </button>`);
            dataSet.push(row);
        });
        return dataSet;
    }


    dataTable = (datSet) => {
        $('#example').DataTable({
            data: datSet,
            columns: [
                { title: "#" },
                { title: "Nombre" },
                { title: "Apellido" },
                { title: "Ciudad" },
                { title: "Municipio" },
                { title: "Acciones" }
            ]
        });
    }

    static mostarDatelleCliente = async (id) => {

        try {
            let consulta = await fetch(`http://127.0.0.1:8080/_soa/api_res/controller/ClientesController.php?idCliente=${id}`);
            let data = await consulta.json();
            console.log(data);
            alert(`Hola : ${data.nombreCliente} ${data.apellidosCliente}`)
        } catch (error) {
            console.log(error);
        }

    }
}

let cliente = new Clientes();
window.addEventListener('load', cliente.getDataCliente(null));