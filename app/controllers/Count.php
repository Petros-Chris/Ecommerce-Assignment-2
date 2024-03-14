<html>
    <div id="counterDiv">
    <?php
        require('app/models/Counter.php');

Class CounterController {

    public function index() {
        $counter=new Counter();
        $counter->increment();
        $counter->write();
        echo("{$counter->count} page vists");
    }
}
    $CC=new CounterController();
    $CC->index();
    ?>
    </div>
</html>