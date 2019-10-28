# Assignment 5
The first import cycle has been run, data has been imported already and some data is still missing.

1. Create fields to identify remote IDs in legacy database.
1. Modify the import script to allow a verify flag, which does not import anything to the remote DB but only verifies all data exists. Shows error if it could not verify certain data remotely.
1. On verification, it stores the each of the remote ID in the legacy DB's new field.
1. Investigate and fix all errors reported, re-run the verify script till no errors are pending
1. Modify the import script to never overrite data that is already added remotely using the remote IDs now available
1. Now also implement the new import code that inserts the data that was missed in the first cycle
1. Modify the import script to have a dry run flag, which only simulates the import and generates a report
1. Check the generated report from the dry run
1. Run the full import cycle.


