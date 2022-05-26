/** @jsxImportSource @emotion/react */
import React, { useEffect, useState } from 'react'
import axios from 'axios'
import { Image } from '@mui/icons-material'
import {
    Box,
    Button,
    CardContent,
    Typography,
} from '@mui/material'
import { css } from '@emotion/react'

type Content = {
    content_id: string
    content_name: string
    content_image: string
    content_url: string
    is_one_account: boolean
    is_paid_subscription: boolean
    created_at: Date
    updated_at: Date
}

export const ContentsPage: React.FC = () => {
    const [contents, setContents] = useState<Content[]>([]);
    const getContents = async () => {
        const { data } = await axios.get<Content[]>('api/contents')
        setContents(data);
    }

    useEffect(() => {
        getContents();
    })

    return (
        <div css={container}>
            <Box css={containerBox}>
                <CardContent css={cBContent}>
                    {contents.map(content => (
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
