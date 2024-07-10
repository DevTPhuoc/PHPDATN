<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\TextInput;

class ChatBoxAIController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $response = $this->detectIntent($message);
        return response()->json($response);
    }

    // private function detectIntent($text)
    // {
    //     $projectId = 'your-project-id';
    //     $languageCode = 'en-US'; // Ngôn ngữ của dự án

    //     // Khởi tạo SessionsClient
    //     $sessionsClient = new SessionsClient();
    //     $session = $sessionsClient->sessionName($projectId, uniqid());
    //     $textInput = new TextInput();
    //     $textInput->setText($text);
    //     $textInput->setLanguageCode($languageCode);
    //     $queryInput = new QueryInput();
    //     $queryInput->setText($textInput);

    //     // Gọi API DetectIntent
    //     $response = $sessionsClient->detectIntent($session, $queryInput);
    //     $queryResult = $response->getQueryResult();
    //     $sessionsClient->close();

    //     // Lấy phản hồi từ Dialogflow
    //     $fulfillmentText = $queryResult->getFulfillmentText();

    //     return [
    //         'response' => $fulfillmentText,
    //     ];
    // }
}
