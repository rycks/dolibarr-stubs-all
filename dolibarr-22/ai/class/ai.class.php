<?php

/**
 * Class for AI
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
    const AI_DEFAULT_PROMPT_FOR_EMAIL = 'You are an email editor. Return all HTML content inside a section tag. Do not add explanation.';
    const AI_DEFAULT_PROMPT_FOR_WEBPAGE = 'You are a website editor. Return all HTML content inside a section tag. Do not add explanation.';
    const AI_DEFAULT_PROMPT_FOR_TEXT_TRANSLATION = 'You are a translator, answer with one and only one translation with no comment and explanation.';
    const AI_DEFAULT_PROMPT_FOR_TEXT_SUMMARIZE = 'You are a writer, make the answer in the same language than the original text to summarize.';
    const AI_DEFAULT_PROMPT_FOR_TEXT_REPHRASER = 'You are a writer, give only one answer with no comment and explanation and give the answer in the same language than the original text to rephrase.';
    const AI_DEFAULT_PROMPT_FOR_EXTRAFIELD_FILLER = 'Give only one answer with no comment and explanation, I want the text to be ready to copy and paste.';
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
     * Generate response of instructions
     *
     * @param   string  		$instructions   Instruction to generate content
     * @param   string  		$model          Model name ('gpt-3.5-turbo', 'gpt-4-turbo', 'dall-e-3', ...)
     * @param   string  		$function     	Code of the feature we want to use ('textgeneration', 'transcription', 'audiogeneration', 'imagegeneration', 'translation')
     * @param	string			$format			Format for output ('', 'html', ...)
     * @return  string|array{error:bool,message:string,code?:int,curl_error_no?:int,format?:string,service?:string,function?:string}	$response		Text or array if error
     */
    public function generateContent($instructions, $model = 'auto', $function = 'textgeneration', $format = '')
    {
    }
}