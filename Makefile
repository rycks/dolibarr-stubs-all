MODULE       = dolibarr-stubs
DOC_HOST     ?= doc.cap-rel.fr
DOC_PATH     ?= /home/webs/doc.cap-rel.fr/marginaliamd/data/documents/$(MODULE)
MARGINALIAMD ?= $(HOME)/dev/marginaliamd

.DEFAULT_GOAL := help
.PHONY: help check-doc deploy-doc

help:
	@echo ''
	@echo 'Usage: make <target>'
	@echo ''
	@echo '  check-doc     --  check the developer documentation (links, anchors, translations)'
	@echo '  deploy-doc    --  publish the developer documentation to $(DOC_HOST)'
	@echo ''

# check-documents.php resolves the /$(MODULE)/page links against the folder name,
# so the pages are staged under a folder named after the module first.
check-doc:
	@tmp=$$(mktemp -d) && mkdir "$$tmp/$(MODULE)" && cp docs/developers/*.md "$$tmp/$(MODULE)/" && \
		php $(MARGINALIAMD)/cli/check-documents.php "$$tmp"; status=$$?; rm -rf "$$tmp"; exit $$status

deploy-doc: check-doc
	rsync -avLP docs/developers/ $(DOC_HOST):$(DOC_PATH)/
