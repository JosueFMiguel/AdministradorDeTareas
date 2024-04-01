<?php
	class Informe extends Controller{
		public function __construct(){
			parent::__construct();
		}

		

		public function reporteEmpleados(){
			if(!empty($_POST)){
				$codigo = $_POST['txtCodigo'];
				$empleados = $this->getModel()->reporteEmpleados($codigo);

				$contenidoEmpleado = "";
				foreach ($empleados as $empleado) {
					$contenidoEmpleado .= "
					<tr>
						<td>$empleado[0]</td>
						<td>$empleado[1]</td>
						<td>$empleado[2]</td>
						<td>$empleado[3]</td>
					</tr>
					";
				}

				echo $contenidoEmpleado;

				$contenido = '<table border="1">
				<tr style="background-color: green; color:white;">
					<td>Código</td>
					<td>Nombre Empleado</td>
					<td>Edad</td>
					<td>Area</td>
				</tr>'.
				$contenidoEmpleado
				.'</table>';

				//echo $codigo;
				$pdf = new TCPDF();
				//Encabezado
				$pdf->setHeaderMargin(10);
				$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Reporte de empleados por area", "Empleados");

				//Contenido
				$pdf->setMargins(20, 30, 20);
				$pdf->addPage();
				$pdf->writeHtml($contenido);
				ob_end_clean();
				$pdf->output("Reporte de empleados por areas.pdf"); 

			}else{
				$pagina = "informe/reporte2";

				//llamamos al modelo empleado desde su url, y creamos una instancia
                $urlModeloEmpleado = 'models/empleadoModelo.php';
				require_once($urlModeloEmpleado);
				$modelEmpleado = new EmpleadoModelo();

				$this->getView()->areas = $modelEmpleado->listadoAreas();
				$this->getView()->loadView($pagina);			
			}

		}



		//Tareas asignadas por empleado

		public function reporteTareas(){
			if(!empty($_POST)){
				$codigoIn = $_POST['txtEmpleadoIn'];
				$Tarea = $this->getModel()->reporteTareas($codigoIn);

				$contenidoTareas = "";
				foreach ($Tarea as $Tareas) {
					$contenidoTareas .= "
					<tr>
						<td>$Tareas[0]</td>
						<td>$Tareas[1]</td>
						<td>$Tareas[2]</td>
						<td>$Tareas[3]</td>
						<td>$Tareas[4]</td>
					</tr>
					";
				}

				echo $contenidoTareas;

				$contenido = '<table border="1">
				<tr style="background-color: red; color:white;">
					<td>Código</td>
					<td>Nombre Tarea</td>
					<td>Descripcion</td>
					<td>Encargado</td>
				</tr>'.
				$contenidoTareas
				.'</table>';

				//echo $codigo;
				$pdf = new TCPDF();
				//Encabezado
				$pdf->setHeaderMargin(10);
				$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Reporte de tareas por empleado", "Tareas");

				//Contenido
				$pdf->setMargins(20, 30, 20);
				$pdf->addPage();
				$pdf->writeHtml($contenido);
				ob_end_clean();
				$pdf->output("Reporte de Tareas asignadas por empleado.pdf"); 

			}else{
				$pagina = "informe/reporte3";

				//llamamos al modelo empleado desde su url, y creamos una instancia
                $urlModeloTareas = 'models/tareaModelo.php';
				require_once($urlModeloTareas);
				$modelTareas = new TareaModelo();

				$this->getView()->encargado = $modelTareas->listadoEncargado();
				$this->getView()->loadView($pagina);			
			}

		}

		//Reporte tareas de empleado en específico
		public function reporteTareasEmpleado(){
			if(!empty($_POST)){
				$nombreEmpleado = $_POST['txtEmpleado'];
				$Tareas = $this->getModel()->reporteTareasEmpleado($nombreEmpleado);

				$contenidoTareas = "";
				foreach ($Tareas as $Tarea) {
					$contenidoTareas .= "
					<tr>
						<td>$Tarea[0]</td>
						<td>$Tarea[1]</td>
						<td>$Tarea[2]</td>
						<td>$Tarea[4]</td>
					</tr>
					";
				}

				echo $contenidoTareas;

				$contenido = '<table border="1">
				<tr style="background-color: red; color:white;">
					<td>Código</td>
					<td>Nombre Tarea</td>
					<td>Descripcion</td>
					<td>Encargado</td>
				</tr>'.
				$contenidoTareas
				.'</table>';

				//echo $codigo;
				$pdf = new TCPDF();
				//Encabezado
				$pdf->setHeaderMargin(10);
				$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Reporte de tareas del empleado", $nombreEmpleado);

				//Contenido
				$pdf->setMargins(20, 30, 20);
				$pdf->addPage();
				$pdf->writeHtml($contenido);
				ob_end_clean();
				$pdf->output("Reporte de Tareas asignadas a $nombreEmpleado.pdf"); 

			}else{
				$pagina = "informe/reporte5";

				//llamamos al modelo empleado desde su url, y creamos una instancia
                $urlModeloTareas = 'models/tareaModelo.php';
				require_once($urlModeloTareas);
				$modelTareas = new TareaModelo();

				$this->getView()->encargado = $modelTareas->listadoEncargado();
				$this->getView()->loadView($pagina);			
			}
		}
		
		//Estado de todas las tareas por área

		public function reporteEstados(){
			if(!empty($_POST)){
				$codigoE = $_POST['txtCodigoE'];
				$estados = $this->getModel()->reporteEstados($codigoE);

				$contenidoEstado = "";
				foreach ($estados as $estado) {
					$contenidoEstado .= "
					<tr>
						<td>$estado[0]</td>
						<td>$estado[1]</td>
						<td>$estado[2]</td>
						<td>$estado[3]</td>
						<td>$estado[4]</td>
						<td>$estado[5]</td>
					</tr>
					";
				}

				echo $contenidoEstado;

				$contenido = '<table border="1">
				<tr style="background-color: blue; color:white;">
					<td>Código</td>
					<td>Nombre de la tarea</td>
					<td>Descripcion</td>
					<td>Estado</td>
					<td>Empleado</td>
					
					<td>Area</td>
				</tr>'.
				$contenidoEstado
				.'</table>';

				//echo $codigo;
				$pdf = new TCPDF();
				//Encabezado
				$pdf->setHeaderMargin(10);
				$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Reporte de estados de tareas por area", "Area");

				//Contenido
				$pdf->setMargins(20, 30, 20);
				$pdf->addPage();
				$pdf->writeHtml($contenido);
				ob_end_clean();
				$pdf->output("Reporte de estados de tarea por areas.pdf"); 

			}else{
				$pagina = "informe/reporte4";

				//llamamos al modelo empleado desde su url, y creamos una instancia
                $urlModeloEstado = 'models/empleadoModelo.php';
				require_once($urlModeloEstado);
				$modelEstado = new EmpleadoModelo();

				$urlModeloTareas = 'models/tareaModelo.php';
				require_once($urlModeloTareas);
				$modelTareas = new TareaModelo();

				$this->getView()->areas = $modelEstado->listadoAreas();
				$this->getView()->loadView($pagina);			
			}

		}

	}
