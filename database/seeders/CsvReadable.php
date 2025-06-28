<?php

namespace Database\Seeders;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Trait that enables Seeder classes to easily read CSV formatted files and seed Models with its data.
 */
trait CsvReadable
{

    /*
     * Full path of the file (normally relative to storage/app) to import
     */
    public string $path = "";

    /*
     * The separator for parsing the CSV data
     */
    public string $separator = ",";

    /*
     * The enclosure  for parsing the CSV data
     */
    public string $enclosure = "\"";

    /*
     * The escape for parsing the CSV data
     */
    public string $escape = "\\";

    /*
     * the row number of the header to read. Default = -1
     *
     * If $header_row is set to null, no header data is read, and the $header attribute is used to determine the
     * columns to import. If the file contains a header row, but is not conform the column names in the model,
     * you should set the $header attribute.
     */
    public int $header_row = -1;

    /*
     * The first row to import. Default set to 0 (first row)
     */
    public int $start_row = 0;

    /*
     * Array with the Model's column names that should be available in the csv file.
     *
     * Set this attribute if the file has no headers or the header row is not conform the column names of the
     * model.
     */
    public Collection $header;

    /**
     * Reads the CSV data and calls the `$callback` function for each row.
     *
     * @param callable $callback name of the callback function to call in each parsed row.
     * @return void
     */
    public function readCsvData(callable $callback) : void
    {
        $lines = collect(explode("\n", Storage::get($this->path)));
        // Removes any \r
        $lines = $lines->map(function ($item) {
            return str_replace("\r", "", $item);
        });

        $current_row = 0;
        foreach ($lines as $line) {
            // Parse the line
            $row = str_getcsv($line, $this->separator, $this->enclosure, $this->escape);
            if ($current_row == $this->header_row) {
                $this->header = collect($row);
            }
            if ($current_row >= $this->start_row) {
                $item_count = count($row);
                if ($item_count == $this->header->count()) {
                    // combine header and row into an Associative Array (key=>value)
                    $importData = $this->header->combine($row)->all();

                    // call the callback function
                    $callback($importData);
                } elseif ($row != [""]) {
                    $msg = implode(', ', $row);
                    $this->command->error("CANNOT IMPORT: [$msg]; Size doesn't match");
                }
            }
            $current_row++;
        }
    }
}
