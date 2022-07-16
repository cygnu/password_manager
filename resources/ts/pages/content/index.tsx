/** @jsxImportSource @emotion/react */
import React from 'react'
import { Image } from '@mui/icons-material'
import { Box, Button, CardContent, Typography } from '@mui/material'
import { css } from '@emotion/react'
import { useContents } from '../../queries/ContentQuery'

export const ContentsPage: React.FC = () => {
  const { data: contents, status } = useContents()

  if (status === 'loading') {
    return <div className="loader" />
  } else if (status === 'error') {
    return <div>Failed to load data.</div>
  } else if (!contents || contents.length <= 0) {
    return <div>There is no data to display.</div>
  }

  return (
    <div css={container}>
      <Box css={containerBox}>
        <CardContent css={cBContent}>
          {contents.map((content) => (
            <li key={content.content_id} css={cBCLi}>
              <Image css={cBCImage} />
              <Button css={cBCButton}>
                <Typography>{content.content_name}</Typography>
              </Button>
              <Typography css={cBCTypography}>{content.content_url}</Typography>
            </li>
          ))}
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
