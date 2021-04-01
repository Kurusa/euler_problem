<?php
require_once(__DIR__ . '/vendor/autoload.php');

use PHPHtmlParser\Dom;
use League\HTMLToMarkdown\HtmlConverter;
use PHPHtmlParser\Exceptions\{ChildNotFoundException,
    CircularException,
    ContentLengthException,
    LogicalException,
    StrictException
};
use Psr\Http\Client\ClientExceptionInterface;

$problemsCount = 800;
$baseUrl = 'https://projecteuler.net/problem=';
$dom = new Dom;
$converter = new HtmlConverter();

for ($i = 1; $i <= $problemsCount; $i++) {
    try {
        $dom->loadFromUrl($baseUrl . $i);
    } catch (ChildNotFoundException | CircularException | LogicalException | StrictException | ContentLengthException | ClientExceptionInterface $e) {
        echo 'Problem ' . $i . ' not found';
    }

    // create folder
    $problemName = $dom->find('#content > h2')->text;
    $folderProblemName = replaceNumbers(str_replace(' ', '', ucwords($problemName)));
    $folderPath = __DIR__ . '/App/Problems/' . $folderProblemName;
    if (!is_dir($folderPath)) {
        mkdir($folderPath);
    }

    // create php class
    $problemClass = fopen($folderPath . '/Problem.php', 'w');
    $content = "<?php
    
namespace App\\\Problems\\" . '\\' . $folderProblemName . ";

use App\\\BaseProblem;

class Problem extends BaseProblem
{
        
    function execute()
    {
    }
    
}
";
    $data = stripslashes($content);
    fwrite($problemClass, $data);
    fclose($problemClass);

    // create README.md
    $readmeFile = fopen($folderPath . '/README.md', 'w');
    $content = '> # ' . $i . '. [' . $problemName . '](https://projecteuler.net/problem=' . $i . ')';
    $dom->find('.problem_content > p')->each(function ($p) use (&$content) {
        $content .= "\n" . '> ' . $p->text . "\n";
    });

    fwrite($readmeFile, $content);
    fclose($readmeFile);

    echo 'I\'m finished with problem ' . $i . "\n";
}

function replaceNumbers(string $problemName)
{
    $problemName = preg_replace('/0/', 'Zero', $problemName);
    $problemName = preg_replace('/1/', 'One', $problemName);
    $problemName = preg_replace('/2/', 'Two', $problemName);
    $problemName = preg_replace('/3/', 'Three', $problemName);
    $problemName = preg_replace('/4/', 'Four', $problemName);
    $problemName = preg_replace('/5/', 'Five', $problemName);
    $problemName = preg_replace('/6/', 'Six', $problemName);
    $problemName = preg_replace('/7/', 'Seven', $problemName);
    $problemName = preg_replace('/8/', 'Eight', $problemName);
    $problemName = preg_replace('/9/', 'Nine', $problemName);

    return $problemName;
}