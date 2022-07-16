/** @jsxImportSource @emotion/react */
import React, { useEffect, useState } from 'react'
import ReactPaginate from 'react-paginate'
import { Image } from '@mui/icons-material'
import { Box, Button, CardContent, Typography } from '@mui/material'
import { css } from '@emotion/react'
import { useContents } from '../../queries/ContentQuery'
import { Content } from '../../types/Content'

export const ContentsPage: React.FC = () => {
  const { data: contents, status } = useContents()
  const [postsPerPage] = useState(20)
  const [pageCount, setPageCount] = useState(0)
  const [currentPage, setPage] = useState(1)

  useEffect(() => {
    if (contents) {
      setPageCount(Math.ceil(contents.data.length / postsPerPage))
    }
  }, [currentPage])

  const handlePageClick = (selectedPage: { selected: number }) => {
    // selectedPage.selectedには、ページ番号 - 1が入る
    const page = selectedPage.selected + 1
    setPage(page)
  }

  if (status === 'loading') {
    return <div className="loader" />
  } else if (status === 'error') {
    return <div>Failed to load data.</div>
  } else if (!contents!.data || contents!.data.length <= 0) {
    return <div>There is no data to display.</div>
  }

  return (
    <div css={container}>
      <Box css={containerBox}>
        <CardContent css={cBContent}>
          {contents!.data.map((content: Content) => (
            <li key={content.content_id} css={cBCLi}>
              <Image css={cBCImage} />
              <Button css={cBCButton}>
                <Typography>{content.content_name}</Typography>
              </Button>
              <Typography css={cBCTypography}>{content.content_url}</Typography>
            </li>
          ))}
          <ReactPaginate
            pageCount={pageCount}
            onPageChange={handlePageClick}
            previousLabel={'Previous'}
            nextLabel={'Next'}
            breakLabel={'...'}
            containerClassName={'pagination'}
            activeClassName={'active'}
          />
        </CardContent>
      </Box>
    </div>
  )
}

const container = css`
  margin-top: 64px;
`

const containerBox = css`
  margin: 0 auto;
  width: 80%;
  max-width: 800px;
  border: 1px solid;
  border-radius: 10px;
`

const cBContent = css``

const cBCLi = css`
  display: flex;
  align-items: center;
  height: 60px;
  padding: 0;
`

const cBCImage = css`
  height: 60px;
  width: 60px;
`

const cBCButton = css`
  align-items: center;
  justify-content: left;
  text-align: left;
  height: 45px;
  width: 150px;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: pre;
`

const cBCTypography = css`
  flex-grow: 1;
  display: -webkit-inline-box;
  padding-left: 10px;
  overflow: hidden;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
`
