import React from 'react'
import { Image } from '@mui/icons-material'
import {
    Box,
    Button,
    CardContent,
    Typography,
} from '@mui/material'

export const ContentPage = () => {
    return (
        <React.Fragment>
            <Box sx={{ border: '1px solid', maxWidth: 800 }}>
                <CardContent>
                    <Image />
                    <Button>
                        <Typography>Amazon</Typography>
                    </Button>
                    <Typography>https://amazon.com</Typography>
                </CardContent>
                <CardContent>
                    <Image />
                    <Button>
                        <Typography>Apple</Typography>
                    </Button>
                    <Typography>https://apple.com</Typography>
                </CardContent>
            </Box>
        </React.Fragment>
    )
}
