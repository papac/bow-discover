<?php

$app->get("/", function () {
    return response()->render("welcome");
});

$app->get("/todos", "TodoController::index");

$app->post("/todos", 'TodoController::store');

$app->delete("/todos/:id", 'TodoController::destroy');

$app->put("/todos/:id", 'TodoController::update');