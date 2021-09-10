<?php
require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/TP2-Desarrollo-Sistema/modelo/Libro.php';
require_once realpath($_SERVER["DOCUMENT_ROOT"]) . '/TP2-Desarrollo-Sistema/modelo/Autor.php';

include('include/cabecera.php');
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Libros
            <small>Gestion De Libros</small>
        </h1>

    </div>
</div>
<?php
if(isset($_GET["e"]))
{
    ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $_GET["e"] ?>
    </div>
<?php
}
?>
<?php
if(isset($_GET["m"]))
{
    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <?php echo $_GET["m"] ?>
    </div>
<?php
}
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Libros <a class="btn-success btn-xs" title="Agregar Libro" href="#" data-toggle="modal" data-target="#modalNuevo">+</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Autor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $listLibros = Libro::BuscarListLibros();
                        foreach( $listLibros as $libro)
                        {?>
                            <tr>
                                <td><?php echo $libro->getTitulo(); ?></td>
                                <td><?php echo $libro->getAutor()->GetNombre(); ?></td>

                            </tr>
                        <?php
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modalNuevo" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nuevo Libro</h4>
            </div>
            <form method="post" action="../acciones/libros/agregar.php">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input name="titulo" type="text" class="form-control" placeholder="Titulo">
                        </div>
                        <hr>
                        <div class="col-md-12">
                            Autor
                            <select name="autor" class="form-control">
                                <?php
                                $listAutores = Autor::BuscarListAutores();
                                foreach( $listAutores as $autor)
                                {?>
                                    <option value="<?php echo $autor->getId(); ?>"><?php echo $autor->getNombre(); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Aceptar</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php
include('include/pie.php');
?>


