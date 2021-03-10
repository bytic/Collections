<?php

declare(strict_types=1);

namespace Nip\Collections;

/**
 * A collection represents a group of objects, known as its elements.
 *
 * Some collections allow duplicate elements and others do not. Some are ordered
 * and others unordered.
 *
 * @template T
 * @template-extends ArrayInterface<T>
 */
interface CollectionInterface extends ArrayInterface
{
    /**
     * Ascending sort type.
     */
    public const SORT_ASC = 'asc';

    /**
     * Descending sort type.
     */
    public const SORT_DESC = 'desc';

    /**
     * Returns the first item of the collection.
     *
     * @return T
     */
    public function first();

    /**
     * Returns the last item of the collection.
     *
     * @return T
     */
    public function last();

}