<?php

namespace App\Action;

use App\Domain\Note\Service\NoteService;
use Slim\Http\Response;
use Slim\Http\ServerRequest;

final class NotesDeleteAction
{
    private $noteService;

    public function __construct(NoteService $noteService)
    {
        $this->noteService = $noteService;
    }

    public function __invoke(ServerRequest $request, Response $response, $args): Response
    {
        $noteId = $this->noteService->deleteNote($args['id']);

        return $response->withJson($noteId)->withStatus(200);
    }
}