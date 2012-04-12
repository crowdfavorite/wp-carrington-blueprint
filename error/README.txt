## error/

This directory holds templates for error conditions. WordPress supports the 404 error out of the box, but you may want to create additional error templates for other conditions (not authorized, etc.).

You can load an error template by using the following code:

	cfct_error('not-authorized.php');


### Example File Descriptions

- *404.php* - used for "File not Found" errors.

This directory is not used by the Carrington engine (template naming conventions are not supported), it is provided solely for convenience and for better organization of these files.