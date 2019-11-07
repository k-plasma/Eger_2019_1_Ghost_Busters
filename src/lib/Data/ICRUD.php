<?php namespace Data;

/**
 * Interface defining the basic data operations.
 */
interface ICRUD
{
    /** Saves the given object to the data storage.
     * @param object $dataObject The data object to be saved.
     * @return object Returns the data object that was saved.
     */
    public function Create(object $dataObject) : object;

    /** Retrieves data objects based on the given filter.
     * @param array $filter The filters for the data object retrieval.
     * @return array Array of results with the filter.
     */
    public function Read(array $filter = null) : array;

    /** Updates a data object on the data storage.
     * @param object $dataObject The data object with the updated data.
     * @return bool Shows if the update was successful.
     */
    public function Update(object $dataObject) : bool;

    /** Deletes a data object from the database.
     * @param object $dataObject The data object to be deleted from the data storage.
     * @return bool Shows if the deletion was successful.
     */
    public function Delete(object $dataObject) : bool;
}