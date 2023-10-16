<?php

namespace App\Console\Commands;

use App\Models\Block;
use App\Models\Expression;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fodase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $block = Block::find(1)->descendants->toTree();

        dd($block);
        $query = $this->buildExpression($block);

        dd($query);
    }

    function buildExpression(Block $block): string
    {
        if (!$block->children->count()) {
            return trim($block->expressions->reduce(function (string $previous, Expression $current) {
                $previousOperator = $current->previous_expression_operator ?? '';
                return "$previous $previousOperator ($current->field $current->operator $current->value)";
            }, ''));
        }

        return $block->children->reduce(function (string $previous, Block $current) {
            $currentResult = $this->buildExpression($current);
            return "$previous ($currentResult)";
        }, '');
    }
}
