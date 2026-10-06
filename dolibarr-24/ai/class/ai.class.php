<?php

/**
 * Class for AI feature
 */
class Ai
{
    /**
     * @var DoliDB $db Database object
     */
    protected $db;
    /**
     * @var string $apiService
     */
    private $apiService;
    /**
     * @var string $apiKey
     */
    private $apiKey;
    /**
     * @var string $apiEndpoint
     */
    private $apiEndpoint;
    const AI_DEFAULT_PROMPT_FOR_EMAIL = 'You are an email editor. Return only the content of the message. Do not add explanation.';
    // Note: This instruction will also be completed by generateContent() to manage text versus HTML content.
    const AI_DEFAULT_PROMPT_FOR_WEBPAGE = 'You are a website editor. Return all HTML content inside a section tag. Do not add explanation.';
    const AI_DEFAULT_PROMPT_FOR_TEXT_TRANSLATION = 'You are a translator, answer with one and only one translation with no comment and explanation.';
    const AI_DEFAULT_PROMPT_FOR_TEXT_SUMMARIZE = 'You are a writer, make the answer in the same language than the original text to summarize.';
    const AI_DEFAULT_PROMPT_FOR_TEXT_SPELLCHECKER = 'You are a proofreader, write your response in the same language as the original text in order to correct spelling and grammar errors. If there is carriage return or line feed in original message, keep them. Keep also any HTML or markdown formatting without changing it or adding one, just fix spelling and grammar errors in text content. Answer with the corrected text and only the corrected text with no comment and explanation. Do not highlight the fixed errors.';
    const AI_DEFAULT_PROMPT_FOR_TEXT_REPHRASER = 'You are a writer, write your response in the same language as the original text to rephrase. Give only one answer with no comment and explanation. If there is carriage return or line feed in original message, keep them. Keep also any HTML or markdown formatting without adding one.';
    const AI_DEFAULT_PROMPT_FOR_EXTRAFIELD_FILLER = 'Give only one answer with no comment and explanation, I want the text to be ready to copy and paste.';
    const AI_DEFAULT_PROMPT_FOR_DOC_PARSING = 'You are an assistant to analyze documents. Return your answer with a JSON string and only a JSON string, do not add any other comment.';
    /**
     * Constructor
     *
     * @param	DoliDB	$db		 Database handler
     *
     */
    public function __construct($db)
    {
    }
    /**
     * get API Service
     *
     * @return	string		API service
     */
    public function getApiService()
    {
    }
    /**
     * Generate the response of an AI prompt.
     *
     * @param   string|array<mixed,mixed>	$instructions   String instruction to generate content (or file path) or array of payload or ID of file with function threads
     * @param   string  					$model          Model name ('gpt-4.1-turbo', 'gpt-4.1', 'dall-e-3', ...)
     * @param   string  					$function     	Code of the feature we want to use ('textgeneration', 'transcription', 'audiogeneration', 'imagegeneration', 'translation', 'docparsing')
     * @param	string						$format			Format for output ('', 'html', ...)
     * @param	array<string,string>		$moreheaders	More headers
     * @param	string						$moreendpoint	Add a part to endpoint url
     * @return  string|array{error:bool,message:string,code?:int,curl_error_no?:int,format?:string,service?:string,function?:string}	$response		Text or array if error
     */
    public function generateContent($instructions, $model = 'auto', $function = 'textgeneration', $format = '', $moreheaders = array(), $moreendpoint = '')
    {
    }
}