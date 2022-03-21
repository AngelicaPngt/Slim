<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();

    /*$app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    }); */

    $app->get("/api/mahasiswa", function (Request $request, Response $response){
        $sql = "SELECT * FROM mahasiswa";
        $stmt = $this->db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetchAll();
        return $response->withJson(["status" => "succsess", "data" => $result], 200);
    });

    $app->get("/api/mahasiswa/{nim}", function (Request $request, Response $response, $args){
        $nim = $args["nim"];
        $sql = "SELECT * FROM mahasiswa WHERE nim=:nim";
        $stmt = $this->db->prepare($sql);
        $stmt ->execute([":nim" => $nim]);
        $result = $stmt->fetchAll();
        return $response->withJson(["status" => "succsess", "data" => $result], 200);
    });

};
