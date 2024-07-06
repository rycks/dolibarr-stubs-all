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
     * @param   string  	$instructions   Instruction to generate content
     * @param   string  	$model          Model name ('gpt-3.5-turbo', 'gpt-4-turbo', 'dall-e-3', ...)
     * @param   string  	$function     	Code of the feature we want to use ('textgeneration', 'transcription', 'audiotext', 'imagegeneration', 'translation')
     * @param	string		$format			Format for output ('', 'html', ...)
     * @return  mixed   	$response
     */
    public function generateContent($instructions, $model = 'auto', $function = 'textgeneration', $format = '')
    {
    }
}